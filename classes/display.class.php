<?php

/**
 * @author Chris West
 * @copyright 2015
 */
    $display = new display;
    
    class display {
        
        /**
         * Display our common page header used on all our pages
         * @return html
         */
        public function header() { global $smarty;
            $smarty->display("header.tpl");
        }
        
        /**
         * Display our common page footer used on all our pages
         * @return html
         */
        public function footer() { global $smarty;
            $smarty->assign("company", "The British Chocolate Box");
        
            $smarty->display("footer.tpl");
        }
    }

?>