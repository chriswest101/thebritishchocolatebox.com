<?php

/**
 * @author Chris West
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
        
        /**
         * Get the size of the boxes we offer from the DB
         * @return array of our box sizes
         */
        public function getBoxes() {  global $smarty, $db;
	        $boxes = $db->query("SELECT * FROM box_sizes");
            
            $smarty->assign("boxes", $boxes);
        }
        
        /**
         * Get all our products from the DB
         * @return array of our products
         */
        public function getProducts() {  global $smarty, $db;
	        $products = $db->query("SELECT * FROM products");
            
            $smarty->assign("products", $products);
        }
        
        /**
         * Display our page
         * @return html for page
         */
        public function displayPage()  { global $display, $smarty;
            $display->header();
            $smarty->display("buy.tpl");
            $display->footer();
        } 
    }    
    
?>