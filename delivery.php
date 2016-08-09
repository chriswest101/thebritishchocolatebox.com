<?php

/**
 * @author Chris West
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    
    $page = new page;
    
    class page {
        
        public function __construct() {
            $this->showPage();
        }  
        
        /**
         * Show our delivery page content
         * @return html for page
         */
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "homepage");
            
            $display->header();
            
            $smarty->display("deliveryMain.tpl");
            
            $display->footer();
        }
    }    
    
?>