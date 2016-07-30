<?php

/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    
    $page = new page;
    
    class page {
        
        public function __construct() { global $display, $smarty, $db;
            $this->getBoxes();
            $this->getProducts();
            
            $this->displayPage();
        }  
        
        public function getBoxes() {  global $smarty, $db;
	        $boxes = $db->query("SELECT * FROM box_sizes");
            
            $smarty->assign("boxes", $boxes);
        }
        
        public function getProducts() {  global $smarty, $db;
	        $products = $db->query("SELECT * FROM products");
            
            $smarty->assign("products", $products);
        }
        
        public function displayPage()  { global $display, $smarty;
            $display->header();
            $smarty->display("buy.tpl");
            $display->footer();
        } 
    }    
    
?>