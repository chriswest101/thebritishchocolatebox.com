<?php

/**
 * @author Chris West
 * @copyright 2015
 */
 
    define("BCB", true);
    include("includes/common.php");
    
    $ajax = new ajax;
    
    class ajax {
        public function __construct() {
            
            if(isset($_POST['code'])) {
                $this->ajaxItem($_POST);
            }
            if(isset($_POST['categoryIds'])) {
                $this->getCategoryProducts($_POST['categoryIds']);
            }
            if(isset($_POST['updateDelivery'])) {
                $this->updateDelivery($_POST['courierID']);
            }
            if(isset($_POST['sendMessage'])) {
                $this->sendMessage($_POST);
            }
            if(isset($_POST['ajaxLoadProducts'])) {
                $this->ajaxLoadProducts($_POST);
            }
            if(isset($_POST['showModal'])) {
                $this->getModalData($_POST['prod_code']);
            }
        }
        
        
        /**
         * Adds an item to the cart
         * @param array $addItem is an array of the item containing name, code etc
         * @return returns the new cart total
         */
        public function ajaxItem($addItem) { global $db;
            
            $newItem = $db->row("SELECT * FROM products WHERE prod_code = '{$addItem['code']}'");
            
            $found = false;
            if(isset($_SESSION['checkout']['items'])) {
                foreach($_SESSION['checkout']['items'] as $key => $item) {
                    if($addItem['code'] == $item['prod_code']) {
                        $found = true;
                        $_SESSION['checkout']['items'][$key]['qty'] += $addItem['qty'];
                    }
                }
                
                if($found === false) {
                    $_SESSION['checkout']['items'][] = $newItem;
                    end($_SESSION['checkout']['items']);
                    $key = key($_SESSION['checkout']['items']);
                    $_SESSION['checkout']['items'][$key]['qty'] = $addItem['qty'];
                }
            } else {
                $_SESSION['checkout']['items'][] = $newItem;
                $_SESSION['checkout']['items'][0]['qty'] = $addItem['qty'];
            }
            
            $qty = 0;
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                $qty += $item['qty'];
            }
            $_SESSION['checkout']['item_count'] = $qty;
            
            $this->returnAjaxItem();
        }
        /**
         * Echos the session cart item total
         * @return returns the cart item total
         */
        public function returnAjaxItem() {
            echo $_SESSION['checkout']['item_count'];
        }
        
        
        /**
         * Sort the items on the product pages by category or manufacturer
         * @param String of category ID's split by : character
         * @return returns an array of products and displays a page to ajax back the content
         */
        public function getCategoryProducts($categoryIds) { global $db, $smarty;
            $categoryIds = explode(":", $categoryIds);
            
            $query = "";
            $query1 = "";
            foreach($categoryIds as $key => $category) {
                if($category != "") {
                    $query .= "c.name = '$category' OR ";
                    $query1 .= "p.manufacturer = '$category' OR ";
                }
            }
            $query = substr($query, 0, -3);
            $query1 = substr($query1, 0, -3);
            
            if($query != "" || $query1 != "") {
                $categoryProducts = $db->query("SELECT DISTINCT(p.id), p.* FROM products AS p 
                                                LEFT JOIN product_categories AS pc ON p.id = pc.product_id 
                                                LEFT JOIN categories AS c ON pc.category_id = c.id
                                                WHERE ($query)
                                                OR ($query1)");
            } else {
            	$position = 0;
            	$limit = 12;
            	$orderBy = "featured DESC";
                $categoryProducts = $db->query("SELECT * FROM products WHERE discontinued=0 ORDER BY $orderBy LIMIT $position, $limit");
            }
            
            $this->returnCategoryProducts($categoryProducts);
        }
        /**
         * Return html for sorting by category 
         * @param array of products sorted
         * @return html for page
         */
        public function returnCategoryProducts($categoryProducts) { global $smarty;
            $smarty->assign("products", $categoryProducts);
            $smarty->display("product.tpl");
        }
        
        
        // UPDATE COURIER ON CHECKOUT
        /**
         * Update courier call from checkout 
         * @param int courier ID
         * @return return new totals
         */
        public function updateDelivery($courierID) { global $cart;
            require_once("classes/cart.class.php");
            
            $_SESSION['checkout']['delivery']['id'] = $courierID;
            
            $cart->addTotals();  
            $this->returnUpdateDelivery();          
        }
        /**
         * Return the html from changing the courier in the checkout 
         * @return html content
         */
        public function returnUpdateDelivery() { global $smarty;
            $smarty->display("totals.tpl");
        }
        
        
        /**
         * Function called from the ajax scrolling to load more products
         * @param array containing the required data to load more products, current product number, order by, how many to load
         * @return 
         */
        public function ajaxLoadProducts($data) { global $db, $smarty;
        
            //sanitize post value
            $curentNumber = filter_var($data["currentNumber"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
            
            //throw HTTP error if group number is not valid
            if(!is_numeric($curentNumber)){
                header('HTTP/1.1 500 Invalid number!');
                exit();
            }
            
            //prepare vars
            $orderBy = $this->prepareVars($data['order_by']);
            
            //get current starting point of records
            $position = ($curentNumber);
            
            //Limit our results within a specified range. 
            $products = $db->query("{$_SESSION['productSearch']['query']} ORDER BY $orderBy LIMIT $position, {$data['limit']}");
            
            $smarty->assign("products", $products);
            
            $this->returnAjaxLoadProducts();
            exit();
        }
        /**
         * Prepare the variable needed to order the products in the load more products function
         * @param string of the order in which to order the products, ASC or DESC and the variable to order by, featured, price etc separated by /
         * @return string for which to order by
         */
        public function prepareVars($orderBy) {
            $orderBy = explode("/", $orderBy);
            
            switch($orderBy[0]) {
                case "featured":    return "featured {$orderBy[1]}";      break;
                case "price":       return "price {$orderBy[1]}";         break;
                case "sale_price":  return "sale_price {$orderBy[1]}";    break;
                case "name":        return "name {$orderBy[1]}";          break;
                case "manufacturer":return "manufacturer {$orderBy[1]}";  break;
                default:            return "featured {$orderBy[1]}";
            }
        }
        /**
         * Returns the html of the products loaded by ajax
         * @return html of products
         */
        public function returnAjaxLoadProducts() { global $smarty;
            $smarty->display("product.tpl");
        }
        
        
        /**
         * Get details of a product 
         * @param string of product code
         * @return html of product
         */
        public function getModalData($prodCode) { global $db, $smarty;
            $product = $db->row("SELECT * FROM products WHERE prod_code = '{$prodCode}'");
            
            $smarty->assign("product", $product);
            
            $this->returnGetModalData();
        }
        /**
         * Return the html of the modal product
         * @return return html
         */
        public function returnGetModalData() { global $smarty;
            $smarty->display("modal_content.tpl");
        }
    }
    
?>