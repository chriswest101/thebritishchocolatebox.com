<?php


/**
 * @author Chris West
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
        
        /**
         * Get our cart session items
         * @return array of our cart items from session
         */
        public function getSessionItems() { global $smarty;        
            if(isset($_SESSION['checkout']['items'])) {    
                $smarty->assign("cart", $_SESSION['checkout']['items']);
            }
        }
        
        /**
         * Clear the session checkout array to start the checkout agian
         * @return session cleared
         */
        public function resetCheckout() {
            unset($_SESSION['checkout']);
        }
        
        /**
         * Show our page
         * @return our page html
         */
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            $smarty->assign("stage", "cart");
            
            $display->header();
            
            $smarty->display("cart.tpl");
            
            $display->footer();
        }
    }    
    
?>