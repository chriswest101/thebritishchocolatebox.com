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
            $this->getItems( (isset($_POST['limit']) ? $_POST['limit'] : 12), (isset($_POST['order_by']) ? $_POST['order_by'] : "featured/DESC"), (isset($_POST['category']) ? $_POST['category'] : false), (isset($_POST['manufacturers']) ? $_POST['manufacturers'] : false) );
            $this->getCategories();
            $this->getManufacturers();
            
            $this->showPage();
        }  
        
        public function getItems($limit = 12, $orderByPost = "featured/DESC", $categories = false, $manufacturers = false) {  global $smarty, $db;
            $orderBy = $this->prepareVars($orderByPost);
            
            if($categories || $manufacturers) {
                $query = "";
                $query1 = "";
                $selected = array();
                
                if($categories) {
                    foreach($categories as $key => $category) {
                        $query .= "c.name = '$key' OR ";
                        $query1 .= "p.manufacturer = '$key' OR ";
                        $selected[$key] = $key;
                    }
                }
                if($manufacturers) {
                    foreach($manufacturers as $key => $manufacturer) {
                        $query1 .= "p.manufacturer = '$key' OR ";
                        $query .= "c.name = '$key' OR ";
                        $selected[$key] = $key;
                    }
                }
                
                $query = $query != "" ? substr($query, 0, -3) : "";
                $query1 = $query1 != "" ? substr($query1, 0, -3) : "";
                
                if($query != "" || $query1 != "") {
                    $products = $db->query("SELECT DISTINCT(p.id), p.* FROM products AS p 
                                                    LEFT JOIN product_categories AS pc ON p.id = pc.product_id 
                                                    LEFT JOIN categories AS c ON pc.category_id = c.id
                                                    WHERE ($query)
                                                    OR ($query1)
                                                    AND discontinued=0 ORDER BY $orderBy LIMIT $limit");
                                                    
                    $smarty->assign("totalProducts", $db->row("SELECT COUNT(id) as productCount FROM (SELECT DISTINCT(p.id) as prodID, p.* FROM products AS p 
                                                    LEFT JOIN product_categories AS pc ON p.id = pc.product_id 
                                                    LEFT JOIN categories AS c ON pc.category_id = c.id
                                                    WHERE ($query)
                                                    OR ($query1)
                                                    AND discontinued=0) as a"));
                    
                    $_SESSION['productSearch']['query'] = "SELECT DISTINCT(p.id), p.* FROM products AS p 
                                                    LEFT JOIN product_categories AS pc ON p.id = pc.product_id 
                                                    LEFT JOIN categories AS c ON pc.category_id = c.id
                                                    WHERE ($query)
                                                    OR ($query1)
                                                    AND discontinued=0";
                } else {
                    $products = $db->query("SELECT * FROM `products` WHERE discontinued=0 ORDER BY $orderBy LIMIT $limit");
                    
                    $smarty->assign("totalProducts", $db->row("SELECT COUNT(id) as productCount FROM `products` WHERE discontinued=0"));
                    
                    $_SESSION['productSearch']['query'] = "SELECT * FROM `products` WHERE discontinued=0";
                }
            } else {
	       $products = $db->query("SELECT * FROM `products` WHERE discontinued=0 ORDER BY $orderBy LIMIT $limit");
               
               $smarty->assign("totalProducts", $db->row("SELECT COUNT(id) as productCount FROM `products` WHERE discontinued=0"));
               
               $_SESSION['productSearch']['query'] = "SELECT * FROM `products` WHERE discontinued=0";
            }
            
            $smarty->assign("products", $products);
            $smarty->assign("selected", $selected);
            $smarty->assign("orderBy", $orderByPost);
            $smarty->assign("limit", $limit);
        }
        
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
        
        public function getCategories() {  global $smarty, $db;
	        $categories = $db->query("SELECT * FROM `categories`");
            
            $smarty->assign("categories", $categories);
        }
        
        public function getManufacturers() {  global $smarty, $db;
	        $manufacturers = $db->query("SELECT DISTINCT(manufacturer) as name FROM `products`");
            
            $smarty->assign("manufacturers", $manufacturers);
        }
        
        public function showPage() { global $display, $smarty;
            $smarty->assign("page", "left-sidebar");
            $smarty->assign("pageType", "products");
            
            $display->header();
            
            $smarty->display("products.tpl");
            
            $display->footer();
        }
    }    
    
?>