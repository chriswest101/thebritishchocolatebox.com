<?php

/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    
    $page = new page;
    
    class page {
        
        public function __construct() {
            $this->showPage();
        }  
        
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "homepage");
            
            $display->header();
            
            $smarty->display("deliveryMain.tpl");
            
            $display->footer();
        }
    }    
    
?>