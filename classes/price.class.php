<?php

/**
 * @author 
 * @copyright 2014
 */
    $price = new price;
    class price {
        
        var $country, $prices, $orderValue, $delivery, $orderTotal, $orderVat, $deliveryVat, $deposit, $warrantyPrice, $loyaltyDiscount, $loyaltyPercent, $tempTotal;
        
        /**
         * Public Functions
         **/
        /** Return the prices back to the caller **/
        public function returnPrices($courierid = false, $orderNums = false) {
            
            $type = (isset($_SESSION['tempCustomer']['type']) ? $_SESSION['tempCustomer']['type'] : isset($_SESSION['cmd']['type']) ? $_SESSION['cmd']['type'] : "retail");
            $currency = (isset($_SESSION['tempCustomer']['currency']) ? $_SESSION['tempCustomer']['currency'] : isset($_SESSION['cmd']['currency']) ? $_SESSION['cmd']['currency'] : "pound");
            
            $prices= array(
				'orderTotal'                 => $this->getCartPrice($_SESSION['cart']['items'], $type, $currency),
                'warrantyTotal'              => $this->getWarrantyTotal($_SESSION['tempcart']),
                'delivery'                   => $this->getDeliveryPrice($_SESSION['cart']['items'],$courierid),
                'orderVat'                   => $this->getOrderVat(),
                'deposit'                    => $this->getDeposit($orderNums),
                'loyaltyDiscount'            => $this->calculateLoyaltyDiscount(),
                'loyaltyPercent'             => $this->loyaltyPercent,
                'grossTotal'                 => $this->getGrossTotal(),
                'currency'                   => $this->getCurrencyCode($currency),
 			);
            
            $formattedPrices = array(
                'formattedOrderTotal'        => s::showPrice(array('value' => $prices['orderTotal'], 'currency' => $currency)),
                'formattedWarrantyTotal'     => s::showPrice(array('value' => $prices['warrantyTotal'], 'currency' => $currency)),
                'formattedDelivery'          => s::showPrice(array('value' => $prices['delivery'], 'currency' => $currency)),
                'formattedOrderVat'          => s::showPrice(array('value' => $prices['orderVat'], 'currency' => $currency)),
                'formattedDeposit'           => s::showPrice(array('value' => $prices['deposit'], 'currency' => $currency)),
                'formattedGrossTotal'        => s::showPrice(array('value' => $prices['grossTotal'], 'currency' => $currency)),
                'formattedLoyaltyDiscount'            => s::showPrice(array('value' => $prices['loyaltyDiscount'], 'currency' => $currency)),
            );
			return array_merge($prices, $formattedPrices);
        }
        
        
        /** Get the total cart price **/
        public function getCartPrice($cartItems, $type = "retail", $currency="pound") {
            //$cartItems = $_SESSION['cart']['items'];
            
            if ($type == "admin" || $type == "staff" || $type == "dealer"){
                switch ($currency){
                    case "euro" : $fieldName = "trade_euro"; break;
                    case "pound" : $fieldName = "Trade_Price"; break;
                    default : $fieldName = "Trade_Price"; break;
                }               
            } else {
                switch ($currency){
                    case "euro" : $fieldName = "retail_euro"; break;
                    case "pound" : $fieldName = "Retail_Price"; break;
                    default : $fieldName = "Retail_Price"; break;
                }
            }
            
            $vatrate = VAT_RATE/100;
            foreach($cartItems as $item) {	
           	    $data = db::fetch_row("SELECT $fieldName as price FROM `store_item_version` WHERE model_id='{$item['model']}' AND item_version='{$item['version']}' AND out_of_stock=0 AND $fieldName > 0.00 GROUP BY $fieldName ORDER BY $fieldName ASC");
                
                /* Use to calculate Preorder deposit price */
                if($item['type'] == "P") {
                    $data['price'] = DEPOSIT;
                }
                if($item['type'] == "SOR") {
                    $data['price'] = SOR_FEE;
                }
                
                if($item['type'] != "warranty" && $item['type'] != "item") {
                    $this->tempTotal += $data['price'];
                }
                
                $this->orderValue += $data['price'];
                $this->orderVat += ($type== "dealer" || $type== "admin" ? $data['price']*$vatrate : 0);
            }
            
            return $this->orderValue;
        }
        
        
        /** Get the delivery prices for this order **/
        public function getDeliveryPrice($cart, $courierid =false) { global $couriers;
            require_once('couriers.class.php');            
            
            /* Get the coutier data used to work out the delivery price */
            $tempCouriers = $couriers->getCouriers($cart, $courierid);
            $this->deliveryVat = ($_SESSION['cart']['cartType'] == "O" ? $tempCouriers['0']['courierVat'] : 0);
            $this->delivery = ($_SESSION['cart']['cartType'] == "O" ? $tempCouriers['0']['cost'] : 0);
            
            return $this->delivery;
        }
        
        
        /** Get the gross total of the cart **/
        public function getOrderVat() {
            $this->orderVat = $this->orderVat + $this->deliveryVat;
            
            return $this->orderVat;
        }
        
        
        /** Get the gross total of the cart **/
        public function getGrossTotal() {
            $this->orderTotal = $this->orderValue + $this->delivery + $this->orderVat + $this->warrantyPrice - $this->deposit - $this->loyaltyDiscount;
            
            return $this->orderTotal;
        }
        
        
        /** Get the loyalty discount available for the customer and return the discounted price and also set the discount percent **/
        public function calculateLoyaltyDiscount() {
            $login = false;
            
            /* Find out if we should use the temp customers login or the main login */
            if(isset($_SESSION['tempCustomer']['login'])) {
                $login = $_SESSION['tempCustomer']['login'];
            } elseif(isset($_SESSION['cmd']['login'])) {
                $login = $_SESSION['cmd']['login'];   
            }
            
            /* If no login then the customer is not logged in so there's no discount to apply */
            if($login == false) {
                $this->loyaltyDiscount = 0;
                return $this->loyaltyDiscount;
            }
            
            /* Get the discounts */
            $discounts = db::fetch_array("SELECT upper, lower, percent FROM `loyalty_discount` WHERE active_till>'".date("YmdHis")."'");
                
            /* Find our dealer based on the login above */
            $dealer = db::fetch_row("SELECT customerID, login, business_name, loyalty_calc, man_calc FROM `dealers_login` WHERE (total_order!='0.00' OR loyalty_calc2014!='1.00') AND login='$login'");
            
            /* If the dealer cannot be found because total_order OR loyalty_calc2014 in query then return 0 */
            if(!$dealer) {
                $this->loyaltyDiscount = 0;
                return $this->loyaltyDiscount;
            }
            
            /* For the dealer find out his orders for the past 4 months */
            $month = db::fetch_result("mycount", "SELECT SUM(l_qty_sent) AS mycount FROM `order_history` WHERE (h_req_date>'".date("Ym")."00000000' AND h_req_date<'".date("Ym")."99999999') AND frame_no!='' AND frame_no!='na' AND h_cust_no='{$dealer['customerID']}'");   
            $month1 = db::fetch_result("mycount", "SELECT SUM(l_qty_sent) AS mycount FROM `order_history` WHERE (h_req_date>'".date("Ym", strtotime("first day of 1 month ago"))."00000000' AND h_req_date<'".date("Ym", strtotime("first day of 1 month ago"))."99999999') AND frame_no!='' AND frame_no!='na' AND h_cust_no='{$dealer['customerID']}'");
            $month2 = db::fetch_result("mycount", "SELECT SUM(l_qty_sent) AS mycount FROM `order_history` WHERE (h_req_date>'".date("Ym", strtotime("first day of 2 months ago"))."00000000' AND h_req_date<'".date("Ym", strtotime("first day of 2 months ago"))."99999999') AND frame_no!='' AND frame_no!='na' AND h_cust_no='{$dealer['customerID']}'");
            $month3 = db::fetch_result("mycount", "SELECT SUM(l_qty_sent) AS mycount FROM `order_history` WHERE (h_req_date>'".date("Ym", strtotime("first day of 3 months ago"))."00000000' AND h_req_date<'".date("Ym", strtotime("first day of 3 months ago"))."99999999') AND frame_no!='' AND frame_no!='na' AND h_cust_no='{$dealer['customerID']}'");
            $month4 = db::fetch_result("mycount", "SELECT SUM(l_qty_sent) AS mycount FROM `order_history` WHERE (h_req_date>'".date("Ym", strtotime("first day of 4 months ago"))."00000000' AND h_req_date<'".date("Ym", strtotime("first day of 4 months ago"))."99999999') AND frame_no!='' AND frame_no!='na' AND h_cust_no='{$dealer['customerID']}'");
            
            /* how many has been purchased */
            $sold = $month1 + $month2 + $month3;
            
            $threshold = "";
            $percent = "";
            $entitle = "";
            
            /* Loop through and find out which tier the dealer is in and get that percent */
            foreach ($discounts as $disc) {
                if ($sold >= $disc['lower'] && $sold <= $disc['upper']) {
                    $threshold = str_replace("200000", ">", "{$disc['lower']} - {$disc['upper']}");
                    $percent = "{$disc['percent']}%";
                    $entitle = $disc['percent'] * $dealer['loyalty_calc'];
                }
            }
            
            /* Used to know the percent the dealer has for this month */
            $this->loyaltyPercent = $entitle;
            
            /* Work out how much discount they have got based on the order_value */
            $discount = $entitle / 100;
            $this->loyaltyDiscount = $this->tempTotal * $discount;
                        
            return $this->loyaltyDiscount;

        }
        
        
        /** Make warranty prices **/
        public function createExtraPrice($qty, $currency) {
            return $qty * EXTENDED_WARRANTY;
        }
        
        
        /** Get extra waranty totals **/
        public function getWarrantyTotal($items) {
            foreach($items as $key => $item) {
                if(isset($item['warranty_price'])) {
                    $this->warrantyPrice = $this->warrantyPrice + $item['warranty_price'];
                }
            }
            return $this->warrantyPrice;
        }
        
        
        /** Get the value of the deposit made on a order if the order is a preorder **/
        public function getDeposit($ordersNums) { global $orders;
            require_once('orders.class.php');
            foreach ($ordersNums as $key => $orderNum) {
                if($orderNum != 0) {
                    $order[] = $orders->getPayment($orderNum);
                }
            }
            
            if(!isset($order)) {
                return $this->deposit;
            }
            
            foreach($order as $key => $item) {
                $this->deposit = $this->deposit + $item['amount'];
                
            }
            return $this->deposit;
        }
        
        /** Get the correct currency code **/
        public function getCurrencyCode($currency) {
            switch (strtolower($currency)){
                case "euro" : return "EUR";
                case "eur" : return "EUR";
                case "pound" : return "GBP";
                case "gbp" : return "GBP";
                case "us" : return "USD";
                case "usd" : return "USD";
                default : return "GBP";
            }   
        }
        
        /** This is the function that will assign the prices for the items **/
		function createItemPrice($item, $qty, $type = "login", $currency="pound") {
		  
            if ($type == "admin" || $type == "staff" || $type == "dealer"){
                switch ($currency){
                    case "euro" : $fieldName = "trade_euro"; break;
                    case "pound" : $fieldName = "Trade_Price"; break;
                    default : $fieldName = "Trade_Price"; break;
                }               
            } else {
                switch ($currency){
                    case "euro" : $fieldName = "retail_euro"; break;
                    case "pound" : $fieldName = "Retail_Price"; break;
                    default : $fieldName = "Retail_Price"; break;
                }
            }
            
			$data = db::fetch_row("SELECT $fieldName as price FROM `store_item_version` WHERE model_id='{$item['model']}' AND item_version='{$item['version']}' AND out_of_stock=0 AND $fieldName > 0.00 GROUP BY $fieldName ORDER BY $fieldName ASC");
            /* Use to calculate Preorder deposit price, Add config table with this value */
            
            if($item['type'] == "P") {
                $data['price'] = DEPOSIT;
            }
            
            if($item['type'] == "SOR") {
                $data['price'] = SOR_FEE;
            }
            
			if($qty) {
                return sprintf("%01.2f",($data['price']*$qty));
            } else {
                return sprintf("%01.2f",$data['price']);
            }
		}
        
        
        /**
         * Private Functions
         * /  
        /** Loads the country information so it can be stored **/
		private function loadCountry() {
			if(!$_SESSION['cmd']['country'])
                $_SESSION['cmd']['country'] = "United Kingdom";
                
			$this->country = db::fetch_row("SELECT * FROM `country` WHERE country='{$_SESSION['cmd']['country']}'");
		}
    }

?>
