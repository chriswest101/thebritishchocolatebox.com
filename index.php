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
            $this->getItems();
            
            $this->showPage();
        }  
        
        /**
         * Get a array of our featured items
         * @return array of our featured items
         */
        public function getItems() {  global $smarty, $db;
	        $products = $db->query("SELECT * FROM products WHERE featured=1");
            
            $smarty->assign("products", $products);
        }
        
        /**
         * Display our index page
         * @return our index html
         */
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "homepage");
            
            $display->header();
            
            $smarty->display("index.tpl");
            
            $display->footer();
        }
    }    
    
?>