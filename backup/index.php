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
            $this->getItems();
            
            $this->displayPage();
        }  
        
        public function getItems() {  global $smarty, $db;
	        $products = $db->query("SELECT * FROM products WHERE featured=1");
            
            $smarty->assign("products", $products);
        }
        
        public function displayPage()  { global $display, $smarty;
            $display->header();
            $smarty->display("index.tpl");
            $display->footer();
        } 
    }    
    
?>