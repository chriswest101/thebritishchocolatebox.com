<?php

/**
 * @author Chris West
 * @copyright 2015
 */
    
    $cart = new cart;
    
    class cart {
        /**
         * Get how many items we have in session
         * @return int of how many items we have in our cart
         */
        public function countCartItems() {
            if(isset($_SESSION['checkout']['item_count'])) {
                return $_SESSION['checkout']['item_count'];
            }
            return false;
        }
        
        /**
         * Found out how many cart items we have in session
         * @return store our item count in session
         */
        public function calculateCartItemCount() {
            $qty = 0;
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                $qty += $item['qty'];
            }
            $_SESSION['checkout']['item_count'] = $qty;
        }
        
        /**
         * Update the qty of one of our items
         * @param array $data containing our product we want to update and the new qty
         * @return return item count increased
         */
        public function updateItem($data) { global $db;
            // Find our item to increase the qty for
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                if($item['prod_code'] == $data['prod_code']) {
                    $_SESSION['checkout']['items'][$key]['qty'] = $data['qty'];
                }
            }
            
            $this->calculateCartItemCount();
        }
        
        /**
         * Remove an item from our cart session
         * @param array $data containing our item we want to remove from our session cart
         * @return item removed
         */
        public function removeItem($data) { global $db;
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                if($item['prod_code'] == $data['prod_code']) {
                    unset($_SESSION['checkout']['items'][$key]);
                }
            }
            
            $this->calculateCartItemCount();
        }
        
        /**
         * Find and apply any discount the user has
         * @param array $data of the discount code
         * @return discount code applied to session
         */
        public function applyDiscount($data) { global $db, $smarty;
            $discount = $db->row("SELECT * FROM `discounts` WHERE code = :code AND start < :start AND end > :end", array( "code"=>$data['code'], "start"=>date("YmdHis"), "end"=>date("YmdHis")));
            
            if(isset($discount['id'])) {
                $_SESSION['checkout']['discount'] = $discount;
            } else {
                unset($_SESSION['checkout']['discount']);
                $smarty->assign("notFoundDiscount", true);
            }
        }
        
        /**
         * Remove discount applied to session
         * @return discount removed
         */
        public function removeDiscount() {
            unset($_SESSION['checkout']['discount']);
        }
        
        /**
         * Calculate our item totals
         * @param $session items
         * @return totals in session
         */
        public function addTotals() { global $db;
            $grossTotal     = 0;
            $savingsTotal   = 0;
            
            // Loop through our items and total up the item prices
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                $total      = 0;
                $saleTotal  = 0;
                
                $total          += ($item['price'] * $item['qty']);
                $saleTotal      += ($item['sale_price'] * $item['qty']);
                $grossTotal     += $saleTotal > 0 ? $saleTotal : $total;
                $savingsTotal   += $saleTotal > 0 ? $total - $saleTotal : 0;
                
                $_SESSION['checkout']['items'][$key]['price_total']     = sprintf("%01.2f", $total);
                $_SESSION['checkout']['items'][$key]['sale_total']      = sprintf("%01.2f", $saleTotal);
            }
            
            // Get our chosen delivery with price
            if(isset($_SESSION['checkout']['delivery']['id'])) {
                $couriers = $db->query("SELECT * FROM `couriers` WHERE id = '{$_SESSION['checkout']['delivery']['id']}' ORDER BY courier_name");
            } else {
                $couriers = $db->query("SELECT * FROM `couriers` WHERE country = '{$_SESSION['location']}' ORDER BY courier_name");
            }
            
            // Calculate the shipping costs based on 10 products to a box
            foreach($couriers as $key => $courier) {
                $couriers[$key]['cost'] = ceil(($_SESSION['checkout']['item_count'] / 10)) * $couriers[$key]['cost'];
            }

            // Apply our totals to session
            $_SESSION['checkout']['totals']['delivery']             = sprintf("%01.2f", $couriers[0]['cost']);
            $_SESSION['checkout']['totals']['savings_total']        = sprintf("%01.2f", $savingsTotal);
            $_SESSION['checkout']['totals']['gross_total']          = sprintf("%01.2f", $grossTotal + $couriers[0]['cost']);
            $_SESSION['checkout']['totals']['order_vat']            = sprintf("%01.2f", $_SESSION['checkout']['totals']['gross_total'] - ($_SESSION['checkout']['totals']['gross_total'] / (VAT_RATE)));
            
            // Apply discounts if any to session totals
            if(isset($_SESSION['checkout']['discount']['id'])) {
                
                $discountSavings = $_SESSION['checkout']['totals']['gross_total'] * ($_SESSION['checkout']['discount']['percent'] / 100);
                
                $_SESSION['checkout']['discount']['discount_savings'] = $discountSavings;
                $_SESSION['checkout']['totals']['savings_total'] += $discountSavings;
                $_SESSION['checkout']['totals']['gross_total'] -= $discountSavings;
            }
        }
    }

?>
