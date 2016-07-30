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
            if($_POST['id'] == "ajaxBox") {
                $this->ajaxBox($_POST['boxid']);
            }
        }  
        
        public function ajaxBox($boxString) {  global $smarty, $db;
            $boxData = explode("-", $boxString);
        
	        $_SESSION['cart'][] = array(
                                            'box_size'  => $boxData[0],
                                            'box_limit' => $boxData[1],
                                        );
                                        
            echo json_encode(array(
                   'boxID'      => count($_SESSION['cart']),
                   'boxLimit'   => $_SESSION['cart'][count($_SESSION['cart'])-1]['box_limit'],
                   'boxSize'    => $_SESSION['cart'][count($_SESSION['cart'])-1]['box_size'],
                ));
        }
    }    
    
?>