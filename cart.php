<?php


/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    require_once("classes/cart.class.php");
    
    $page = new page;
    
    class page {
        
        public function __construct() { global $display, $smarty, $db, $cart;
            
            if(isset($_REQUEST['update'])) {
                $cart->updateItem($_POST);
            }
            if(isset($_REQUEST['remove'])) {
                $cart->removeItem($_POST);
            }
            if(isset($_REQUEST['discount'])) {
                $cart->applyDiscount($_POST);
            }
            if(isset($_REQUEST['removeDiscount'])) {
                $cart->removeDiscount();
            }
            if(isset($_REQUEST['emptyCart'])) {
                $this->resetCheckout();
            }
            if(isset($_REQUEST['goToCheckout'])) {
                header("location: checkout.php");
                exit();
            }
            
            if($cart->countCartItems()) {
                $cart->addTotals();
                $this->getSessionItems();
            } else {
                $smarty->assign("noItems", true);
            }
            
            $this->showPage();
        }  
        
        public function getSessionItems() { global $smarty;            
            $smarty->assign("cart", $_SESSION['checkout']['items']);
        }
        
        public function resetCheckout() {
            unset($_SESSION['checkout']);
        }
        
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            $smarty->assign("stage", "cart");
            
            $display->header();
            
            $smarty->display("cart.tpl");
            
            $display->footer();
        }
    }    
    
?>