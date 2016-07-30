<?php

/**
 * @author lolkittens
 * @copyright 2015
 */
    
    $cart = new cart;
    
    class cart {
        public function countCartItems() {
            if(isset($_SESSION['checkout']['item_count'])) {
                return $_SESSION['checkout']['item_count'];
            }
            return false;
        }
        
        public function calculateCartItemCount() {
            $qty = 0;
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                $qty += $item['qty'];
            }
            $_SESSION['checkout']['item_count'] = $qty;
        }
        
        public function updateItem($data) { global $db;
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                if($item['prod_code'] == $data['prod_code']) {
                    $_SESSION['checkout']['items'][$key]['qty'] = $data['qty'];
                }
            }
            
            $this->calculateCartItemCount();
        }
        
        public function removeItem($data) { global $db;
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                if($item['prod_code'] == $data['prod_code']) {
                    unset($_SESSION['checkout']['items'][$key]);
                }
            }
            
            $this->calculateCartItemCount();
        }
        
        public function applyDiscount($data) { global $db, $smarty;
            $discount = $db->row("SELECT * FROM `discounts` WHERE code = :code AND start < :start AND end > :end", array( "code"=>$data['code'], "start"=>date("YmdHis"), "end"=>date("YmdHis")));
            
            if(isset($discount['id'])) {
                $_SESSION['checkout']['discount'] = $discount;
            } else {
                unset($_SESSION['checkout']['discount']);
                $smarty->assign("notFoundDiscount", true);
            }
        }
        
        public function removeDiscount() {
            unset($_SESSION['checkout']['discount']);
        }
        
        public function addTotals() { global $db;
            $grossTotal     = 0;
            $savingsTotal   = 0;
            
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
            
            if(isset($_SESSION['checkout']['delivery']['id'])) {
                $couriers = $db->query("SELECT * FROM `couriers` WHERE id = '{$_SESSION['checkout']['delivery']['id']}' ORDER BY courier_name");
            } else {
                $couriers = $db->query("SELECT * FROM `couriers` WHERE country = '{$_SESSION['location']}' ORDER BY courier_name");
            }
            
            foreach($couriers as $key => $courier) {
                $couriers[$key]['cost'] = ceil(($_SESSION['checkout']['item_count'] / 10)) * $couriers[$key]['cost'];
            }
            
            $_SESSION['checkout']['totals']['delivery']             = sprintf("%01.2f", $couriers[0]['cost']);
            $_SESSION['checkout']['totals']['savings_total']        = sprintf("%01.2f", $savingsTotal);
            $_SESSION['checkout']['totals']['gross_total']          = sprintf("%01.2f", $grossTotal + $couriers[0]['cost']);
            $_SESSION['checkout']['totals']['order_vat']            = sprintf("%01.2f", $_SESSION['checkout']['totals']['gross_total'] - ($_SESSION['checkout']['totals']['gross_total'] / (VAT_RATE)));
            
            if(isset($_SESSION['checkout']['discount']['id'])) {
                
                $discountSavings = $_SESSION['checkout']['totals']['gross_total'] * ($_SESSION['checkout']['discount']['percent'] / 100);
                
                $_SESSION['checkout']['discount']['discount_savings'] = $discountSavings;
                $_SESSION['checkout']['totals']['savings_total'] += $discountSavings;
                $_SESSION['checkout']['totals']['gross_total'] -= $discountSavings;
            }
        }
    }

?>