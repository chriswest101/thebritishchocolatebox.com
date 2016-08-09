<?php


/**
 * @author Chris West
 * @copyright 2015
 */
    
    define("BCB", true);
    require_once("includes/common.php");
    require_once("classes/cart.class.php");
    
    
    
    $page = new page;
    
    class page {
        
        public function __construct() { global $display, $smarty, $db, $cart;
            $this->checkExists($_REQUEST['id']);

            $this->getProduct($_REQUEST['id']);
            
            $this->showPage();
        }  

        /**
         * Check if the product they are searching for exists and redirect to 404 if not found in our DB
         * @param string product code
         * @return 
         */
        public function checkExists($productCode) {
            $product = $db->row("SELECT id FROM `products` WHERE prod_code = :prod_code", array( "prod_code" => $productCode));
            if(!isset($product['id'])) {
                header("location: 404.php");
                exit();
            }
        }
        
        /**
         * Get product from the database
         * @param string product code
         * @return array of our product details and prouct nutritional info
         */
        public function getProduct($productCode) { global $smarty, $db;        
            $smarty->assign("product", $product = $db->row("SELECT * FROM `products` WHERE prod_code = :prod_code", array( "prod_code" => $productCode)));
            
            $smarty->assign("product_nutrition", $product_nutrition = $db->row("SELECT * FROM `product_nutrition` WHERE prod_code = :prod_code", array( "prod_code" => $productCode)));
        }
        
        /**
         * Show our page
         * @return html for our page
         */
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            
            $display->header();
            
            $smarty->display("product.item.tpl");
            
            $display->footer();
        }
    }    
    
?>