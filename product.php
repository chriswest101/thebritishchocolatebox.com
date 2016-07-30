<?php


/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    require_once("classes/cart.class.php");
    
    // Check product exists
    $product = $db->row("SELECT id FROM `products` WHERE prod_code = :prod_code", array( "prod_code" => $_REQUEST['id']));
    if(!isset($product['id'])) {
        header("location: 404.php");
    }
    
    $page = new page;
    
    class page {
        
        public function __construct() { global $display, $smarty, $db, $cart;
            
            $this->getProduct();
            
            $this->showPage();
        }  
        
        public function getProduct() { global $smarty, $db;        
            $smarty->assign("product", $product = $db->row("SELECT * FROM `products` WHERE prod_code = :prod_code", array( "prod_code" => $_REQUEST['id'])));
            
            $smarty->assign("product_nutrition", $product_nutrition = $db->row("SELECT * FROM `product_nutrition` WHERE prod_code = :prod_code", array( "prod_code" => $_REQUEST['id'])));
        }
        
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            
            $display->header();
            
            $smarty->display("product.item.tpl");
            
            $display->footer();
        }
    }    
    
?>