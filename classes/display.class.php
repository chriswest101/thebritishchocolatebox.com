<?php

/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    $display = new display;
    
    class display {
        
        public function header() { global $smarty;
            $smarty->display("header.tpl");
        }
        
        public function footer() { global $smarty;
            $smarty->assign("company", "The British Chocolate Box");
        
            $smarty->display("footer.tpl");
        }
    }

?>