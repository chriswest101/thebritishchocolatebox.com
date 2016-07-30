<?php


/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    require_once("classes/cart.class.php");
    require_once("classes/login.class.php");
    require_once("classes/order.class.php");
    
    $page = new page;
    
    class page {
        
        public function __construct() { global $smarty, $cart, $login;            
            
            if(isset($_REQUEST['enterCustDetails'])) {
                $login->createTempAccount($_POST);
            }
            if(isset($_REQUEST['enterEditAddress'])) {
                $login->editAddress($_POST);
            }
            if(isset($_REQUEST['editAddress'])) {
                $smarty->assign("editAddress", true);
            }
            if(isset($_REQUEST['discount'])) {
                $cart->applyDiscount($_POST);
            }
            if(isset($_REQUEST['removeDiscount'])) {
                $cart->removeDiscount();
            }
            if(isset($_REQUEST['signin'])) {
                if(!$login->loginUser($_POST)) {
                    $smarty->assign("wrongDetails", true);
                }
            }
            
            $stage = 1;
            if(isset($_REQUEST['paypal']) || isset($_REQUEST['secure'])) {
                $stage = 2;
                
                if(isset($_REQUEST['confirm'])) {
                    $stage = 3;
                }                
            }
            if(isset($_REQUEST['create_order'])) {
                $stage = 4;
            }
            
            switch($stage) {
                case 1:     $this->stageOne();      break;
                case 2:     $this->stageTwo();      break;
                case 3:     $this->stageThree();    break;
                case 4:     $this->stageFour();     break;
                default:    $this->stageOne();
            }
            
            
        }  
        /** STAGES **/
        public function stageOne() { global $smarty, $cart, $login;  
            unset($_SESSION['checkout']['paypal']);
            
            if($cart->countCartItems()) {
                $cart->addTotals();
                $this->getSessionItems();
            } else {
                $smarty->assign("noItems", true);
            }
            
            if(!$login->isLoggedIn()) {
                $smarty->assign("notLoggedIn", true);
            }
            
            $this->getPageVars();
            $this->getAddress();
            $this->showStageOne();
        }
        public function stageTwo() { global $smarty, $cart, $login;  
            if(isset($_REQUEST['paypal'])) {
                require_once("includes/payment/paypal/paypal.php");
                $payment = new paypal;
                
                $_SESSION['checkout']['paymentMethod'] = "paypal";
                
                $result = $payment->processPayPal();
                
                if(!$result) { // Returned error
                    $smarty->assign("error", $_SESSION['checkout']['error']);
                    unset($_SESSION['checkout']['error']);
                    $this->stageOne();
                    exit();
                }
            }
        }
        public function stageThree() { global $smarty, $cart, $login, $db;  
            if(isset($_REQUEST['paypal'])) {
                $_SESSION['checkout']['paypal'] = $_REQUEST;
                $smarty->assign("paymentMethod", $_SESSION['checkout']['paymentMethod']);
            }
            $smarty->assign("checkoutStage", "confirm");
            
            $courier = $db->row("SELECT * FROM `couriers` WHERE id = '{$_SESSION['checkout']['delivery']['id']}'");
            $courier['cost'] = ceil(($_SESSION['checkout']['item_count'] / 10)) * $courier['cost'];
            $smarty->assign("courier", $courier);
            
            $this->getSessionItems();
            $this->showStageThree();
        }
        
        public function stageFour() { global $smarty, $cart, $login, $order;  
        
            if(isset($_SESSION['checkout']['paymentMethod'])) {
                if($_SESSION['checkout']['paymentMethod'] == "paypal") {
                    require_once("includes/payment/paypal/paypal.php");
                    $payment = new paypal;
                    
                    $orderID = $order->generateOrderID();
                    
                    $result = $payment->processPayPal();
                    
                    if($result) {
                        $result = $payment->processPayPalPayment($orderID);
                        
                        if($result) {
                            $orderID = $order->createOrder($orderID);
                            
                            $content = $this->createEmail($orderID, $_SESSION['address']['name']);
                            
                            $this->mail($content, $orderID);
                            
                            $smarty->assign("orderID", $orderID);
                            
                            $this->showStageFour();
                        } else {
                            $smarty->assign("error", $_SESSION['checkout']['error']);
                            unset($_SESSION['checkout']['error']);
                            $this->stageOne();
                            exit();
                        }
                    } else {
                        $smarty->assign("error", $_SESSION['checkout']['error']);
                        unset($_SESSION['checkout']['error']);
                        $this->stageOne();
                        exit();
                    }
                }
            } else {
                $this->stageOne();
            }
        }
        
        /** UTILITY **/
        public function getSessionItems() { global $smarty;            
            $smarty->assign("cart", $_SESSION['checkout']['items']);
        }
        
        public function getPageVars() { global $db, $smarty;
            if($_SESSION['location'] == "USA") {
                $states = $db->query("SELECT state FROM `states` ORDER BY state");
            } else {
                $states = $db->query("SELECT county as state FROM `counties` ORDER BY county");
            }
            $smarty->assign("states", $states);
            
            $countries = $db->query("SELECT common_name as name, country_code FROM `countries` WHERE featured=1");
            $smarty->assign("countries", $countries);
            
            $couriers = $db->query("SELECT * FROM `couriers` WHERE country = '{$_SESSION['location']}' ORDER BY courier_name");
            
            
            foreach($couriers as $key => $courier) {
                if(!isset($_SESSION['checkout']['delivery']['id'])) {
                    $_SESSION['checkout']['delivery']['id'] = $couriers[$key]['id'];
                }
            
                $couriers[$key]['cost'] = ceil(($_SESSION['checkout']['item_count'] / 10)) * $couriers[$key]['cost'];
            }
            $smarty->assign("couriers", $couriers);
        }
        
        public function resetCheckout() {
            unset($_SESSION['checkout']);
        }
        
        public function getAddress() { global $db, $smarty;
            $_SESSION['address'] = $db->row("SELECT * FROM `addresses` WHERE email_address = :email_address", array("email_address" => $_SESSION['user']['email_address']));
        }
        
        public function mail($content, $order_id) {
            $headers = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers .= "From: The British Chocolate Box <noreply@thebritishchocolatebox.com>\n";
            
            mail($_SESSION['user']['email_address'], "The British Chocolate Box - Order Confirmation #$order_id", $content, $headers);	
        }
        public function createEmail($order_id, $customerName) {
			$message = <<<MSG
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The British Chocolate Box - Order Confirmation #$order_id</title>
</head>

<body bgcolor="#8d8e90">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
  <tr>
    <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr>
          <td><table width="100%" border="0" cellspacing="10" cellpadding="10">
              <tr>
                <td width="420"><a href= "http://www.thebritishchocolatebox.com" target="_blank"><img src="http://www.thebritishchocolatebox.com/img/paypalHeaderLarge.jpg" width="420" border="0" alt=""/></a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#010101; font-size:14px"><strong><em>Hi $customerName,</em></strong></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">
Thank you for your order. Please find below a confirmation of your order items. Your Order ID is #$order_id Your items will be dispatched shortly and you should receive another email.
<br /><br />

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="20%">Product Code</td>
    <td width="40%">Product</td>
    <td width="20%">Price</td>
    <td width="20%">Quantity</td>
  </tr>
MSG;

foreach($_SESSION['checkout']['items'] as $key => $item) {

$currency = $_SESSION['currency_symbol'];

switch($_SESSION['currency_symbol']) {
    case "£":   $currency = "&pound;";  break;
    case "$":   $currency = "$";        break;
    default:    $currency = "&pound;";
}

if($item['sale_total'] != 0.00) {
    $price = $item['sale_total'];
} else {
    $price = $item['price_total'];
}

$message .= "
  <tr>
    <td width=\"20%\">{$item['prod_code']}</td>
    <td width=\"40%\">{$item['name']}</td>
    <td width=\"20%\">$currency{$price}</td>
    <td width=\"20%\">{$item['qty']}</td>
  </tr>
";
}

$message .= <<<MSG
<tr>
    <td width="20%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
</tr>

<tr>
    <td width="20%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="20%">Delivery</td>
    <td width="20%">$currency{$_SESSION['checkout']['totals']['delivery']}</td>
</tr>

MSG;

if($_SESSION['checkout']['totals']['saveing_total'] != 0.00) {
$message .= <<<MSG
<tr>
    <td width="20%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="20%">Discount</td>
    <td width="20%">&pound;1.99</td>
</tr>
MSG;
}

$message .= <<<MSG
<tr>
    <td width="20%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="20%">VAT</td>
    <td width="20%">$currency{$_SESSION['checkout']['totals']['order_vat']}</td>
</tr>
<tr>
    <td width="20%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
    <td width="20%">Total</td>
    <td width="20%">$currency{$_SESSION['checkout']['totals']['gross_total']}</td>
</tr>

</table>

<br /><br />
Kind regards<br />
The British Chocolate Box</font></td>
                <td width="10%">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><img src="http://www.thebritishchocolatebox.com/img/email/PROMO-GREEN2_07.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%" align="center">&nbsp;</td>
                <td width="14%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://thebritishchocolatebox.com/unsubscribe" style="color:#010203; text-decoration:none"><strong>UNSUBSCRIBE </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="9%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://thebritishchocolatebox.com/index" style="color:#010203; text-decoration:none"><strong>HOME </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="10%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://thebritishchocolatebox.com/products" style="color:#010203; text-decoration:none"><strong>PRODUCTS </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="11%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://thebritishchocolatebox.com/delivery" style="color:#010203; text-decoration:none"><strong>DELIVERY </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="17%" align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://thebritishchocolatebox.com/cart" style="color:#010203; text-decoration:none"><strong>CART </strong></a></font></td>
                <td width="4%" align="right"><a href="https://www.facebook.com/thebritishchocolatebox" target="_blank"><img src="http://www.thebritishchocolatebox.com/img/email/PROMO-GREEN2_09_01.jpg" alt="facebook" width="21" height="19" border="0" /></a></td>
                <td width="5%" align="center"><a href="https://twitter.com/thebritishchocolatebox" target="_blank"><img src="http://www.thebritishchocolatebox.com/img/email/PROMO-GREEN2_09_02.jpg" alt="twitter" width="23" height="19" border="0" /></a></td>
                <td width="4%" align="right"><a href="http://www.instagram.com/thebritishchocolatebox" target="_blank"><img src="http://www.thebritishchocolatebox.com/img/email/PROMO-GREEN2_09_03.jpg" alt="instagram" width="20" height="19" border="0" /></a></td>
                <td width="5%">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><font style="font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#231f20; font-size:8px"><strong>The British Chocolate Box, 10 Church Meadow, Okehampton, Devon, EX201LP | <a href= "mailto:info@thebritishchocolatebox.com?Subject=Contact%Us" style="color:#010203; text-decoration:none">info@thebritishchocolatebox.com</a></strong></font></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
MSG;

            return $message;
        }
        
        
        /** DISPLAY **/
        public function showStageOne() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            $smarty->assign("stage", "checkout");
            
            $display->header();
            
            $smarty->display("checkout.tpl");
            
            $display->footer();
        }
        public function showStageThree() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            $smarty->assign("stage", "checkout_confirm");
            
            $display->header();
            
            $smarty->display("checkout.stage3.tpl");
            
            $display->footer();
        }
        public function showStageFour() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            $smarty->assign("stage", "checkout_complete");
            
            $display->header();
            
            $smarty->display("checkout.stage4.tpl");
            
            $display->footer();
        }
    }    
    
?>