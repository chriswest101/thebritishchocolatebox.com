<?php

/**
 * @author Chris West
 * @copyright 2014
 */
    $cart = new cart;
    
    class cart {
        
        /**
         * Public Functions
         * /
        /** Get and array of all cart items and store it into session **/
        public function getCartItems($type ="O") {
            //$login = (isset($_SESSION['tempCustomer']['login']) ? $_SESSION['tempCustomer']['login'] : $_SESSION['cmd']['login']);
            //echo "SELECT * FROM `cart` WHERE login = '{$_SESSION['cmd']['login']}' (".($type ? "AND type='$type'" : "")." ".($type == "O" ? "OR type='pay_preorder'" : "")." ".($type == "O" ? "OR type='pay_quote'" : "")." ".($type == "O" ? "OR type='warranty'" : "")." ".($type == "O" ? "OR type='SOR'" : "")." ".($type == "O" ? "OR type='item'" : "").") ORDER BY type";
            $cartItems = db::fetch_array("SELECT * FROM `cart` WHERE login = '{$_SESSION['cmd']['login']}' ".($type ? "AND (type='$type'" : "")." ".($type == "O" ? "OR type='pay_preorder'" : "")." ".($type == "O" ? "OR type='pay_quote'" : "")." ".($type == "O" ? "OR type='warranty'" : "")." ".($type == "O" ? "OR type='SOR'" : "")." ".($type == "O" ? "OR type='item'" : "")."".($type ? ")" : "")." ORDER BY type");
            
            $cartItemsCount = 0;
            
            foreach($cartItems as $item) {
                $cartItemsCount += $item['qty'];
            }
            
            $_SESSION['cart']['itemCount'] = $cartItemsCount;
            $_SESSION['cart']['items'] = $cartItems;
            
            return $cartItems;
        }
        
        
        /** Add items to the session cart based on the form post **/
        public function addToCart($partToAdd = "") {
            /*
            $part['0'] = model code
            $part['1'] = version
            $part['2'] = color
            */
            $part = explode("_", $partToAdd);
            
            $cartItems = $_SESSION['cart']['items'];
            foreach($cartItems as $item) {
                $newCart = array(
                    'model'         => $part['0'],
                    'version'       => $part['1'],
                    'color'         => $part['2'],
                    'qty'           => 1,
                );
            }
            
            unset($_SESSION['cart']['items']);
            $_SESSION['cart']['items'] = $newCart;
            
            $this->updateDBCart();
            
            return true;
        }
        
        
        /** Add items to the cart via the ajax call **/
        public function addToCartAjax($newItem) {
            
            $cart = $this->getCartItems($type=false);
            if(is_array($cart)) {
            	foreach($cart as $key => $item) {
        			$itemArray[$key]=array(
        				'model'      => $item['model'],
        				'version'    => $item['version'],
        				'color'      => $item['color'],
                        'type'       => $item['type'],
        				'qty'        => $item['qty'],
                        'order_no'   => $item['order_no'],
        			);
            	}
            }
            
            for($i = 0; $i < $newItem['qty']; $i++) {
				$itemArray[]=array(
					'model'        => $newItem['model'],
					'version'      => $newItem['version'],
					'color'        => $newItem['color'],
                    'type'         => $newItem['type'],
					'qty'          => 1,
                    'order_no'     => isset($newItem['order_no']) ? $newItem['order_no'] : 0,
				);
			}
            
            $_SESSION['cart']['items'] = $itemArray;
            $_SESSION['cart']['itemCount'] = $_SESSION['cart']['itemCount'] + $newItem['qty'];
            
            //echo"<pre>".print_r($_SESSION, true)."</pre>";
            
            $this->updateDBCart();
            return true;
            
        }
        
        
        /** Empty all items from the cart. Delete data from cart table and unset cart session **/
        public function emptyCart() {
            unset($_SESSION['cart']);
            //$login = (isset($_SESSION['tempCustomer']['login']) ? $_SESSION['tempCustomer']['login'] : $_SESSION['cmd']['login']);
            db::query("DELETE FROM `cart` WHERE login='{$_SESSION['cmd']['login']}'");
            
            return true;
        }
        
        
        /** Remove a specific item from the users cart **/
        public function removeItem($itemkey, $item) {
            $model = explode("_", $item);
            $newCart = "";
            
            $tempCart = $_SESSION['cart']['items'];
            foreach($tempCart as $key => $items) {
                $type = isset($model['4']) ? "_".$model['4'] : "";
                if(($items['model'] == $model['0']) && ($items['version'] == $model['1']) && ($items['color'] == $model['2']) && ($items['type'] == $model['3'].$type) /*&& ($key == $itemkey)*/){
                    //We have found the item we want to remove
                } else {//Create the new array minus the item we want to remove
                    $newCart[] = array(
                        'model'         => $items['model'],
                        'version'       => $items['version'],
                        'color'         => $items['color'],
                        'type'          => $items['type'],
                        'qty'           => 1,
                        'order_no'      => isset($items['order_no']) ? $items['order_no'] : 0,
                    );
                }
            }
               
            unset($_SESSION['cart']['items']);
            $_SESSION['cart']['items'] = $newCart;
            $this->updateDBCart();   
            
            return true;  
        }
        
        
        /** Remove a specific item from the users cart **/
        public function removeItems($login, $cartType="O") {
            db::query("DELETE FROM `cart` WHERE login='$login' AND type='$cartType'".($cartType == "O" ? " OR type='pay_preorder'" : "").($cartType == "O" ? " OR type='pay_quote'" : "").($cartType == "O" || $cartType == "pay_quote"  ? " OR type='warranty'" : "").($cartType == "O" ? " OR type='SOR'" : ""));
            unset($_SESSION['cart']);
            
            return true;
        }
        
        /** Old check stock by model **/
        public function checkStock($model, $version, $color, $type, $qty) {
            $checkQty = db::fetch_result("stock", "SELECT count(id) AS stock FROM `barcodes_barcodes` WHERE prod_code='ZS125-48A' AND Version='Standard' AND color='Black' AND cust_id ='' AND order_id='' AND (`condition`='' OR `condition`='0')");
        
            if($qty != $checkQty) {
                return $checkQty;
            } else {
                return $qty;
            }
        }
        
        /** This will return the content for the dropdowns on the bike models page for the version and colours which have sellable stock **/
        public function addToCartBtnVars($model,$version="",$color="",$qtyChoice=true){ global $cart, $orders;
            require_once("classes/stock.class.php");
            require_once("classes/orders.class.php");
            
            $availableStock = $stock->getBikeStockLevel($model, $version, $color);
            foreach($availableStock as $key => $item) {
                
                $preorders = $stock->getArrivalDate($item['code'], $item['version'], $item['color'], 1); 
                $preorders = ($preorders ? date('d M Y', strtotime($preorders)) : false);//Get the preorder arrival date.
                
                $newStock[] = array(
                    'code'      => $item['code'],
                    'version'   => $item['version'],
                    'color'     => $item['color'],
                    'qty'       => $item['stock'],
                    'isPreorder'=> ($item['stock'] < 1 ? true : false),
                    'preorder'  => ($preorders ? $preorders : "Unknown"),
                    'preOrdQty' => login::isRetail() ? "" : $orders->getBikePreorderQty($item['code'], $item['version'], $item['color']), //Use this instead of one below if you want to limit by the stock we have coming in
                    //'preOrdQty' => 99,
                );
            }
            /* No need to keep out of stock bikes, unset them */
            foreach($newStock as $key => $value) {
                if($value['qty'] < 1 && $value['preOrdQty'] < 1) {
                    unset($newStock[$key]);
                }
            }
            $newStock = array_values($newStock);
            //echo"<pre>".print_r($newStock, true)."</pre>";
            $vars = array(
                'modelCode'      => $model,
                'versionsStock'  => $newStock,
                'loggedin'       => $_SESSION['cmd']['login'] ? true : false,
            );
            //echo"<pre>".print_r($vars, true)."</pre>";
            return $vars;
        }
                
        
        /** Update the qty of an item in the cart **/
        public function updateCart($key="", $item="", $qty="") {
            $model = explode("_", $item);
            
            $temp;
			$_SESSION['Temp']=0;
			$myNewItems = "";
			$temparray=array();
    		$x=1;
    
    		/* Create an array of our items grouped by the qty. */
		    foreach($_SESSION['cart']['items'] as $c => $i) {
	    		$code       = $i['model'];
	    		$model      = $i['model'];
	    		$version    = $i['version'];
	    		$color      = $i['color'];
                $type       = $i['type'];
                $orderno    = $i['order_no'];
	    		
	    		if(@is_array($temparray[$code][$model][$version][$color][$type][$orderno])) {
	    			$temparray[$code][$model][$version][$color][$type][$orderno]['qty']=$temparray[$code][$model][$version][$color][$type][$orderno]['qty']+1;
	    		} else {
	    			$temparray[$code][$model][$version][$color][$type][$orderno]['qty']=1;
	    			$temparray[$code][$model][$version][$color][$type][$orderno]['qty']=1;
	    		}
		    }
            
            
            foreach($temparray as $c => $prod) {
		    	foreach($prod as $n => $p) {
		    		foreach ($p as $k => $v) {
		    		    foreach ($v as $t => $u) {
		    		        foreach ($u as $m => $n) {
        		    			foreach($n as $x=>$y) {
        			    			$farray[] = array(
        			    					'code'         => $c,
        									'model'        => $c,
        									'version'      => $k,
        									'color'        => $t,
                                            'type'         => $m,
                                            'order_no'     => $x,
        									'qty'          => $y['qty'],
        							);
        						}
                            }
                        }
		    		}
		    	}	
		    }
            
            /* Find our bike which we want to add qty to based on the key based in and update the qty qith the wty passed in */         
            foreach ($farray as $k => $i) {
				
				if($k == $key) {
					$narray[$k] = array(
                            'model'        => $i['code'], 
						    'version'      => $i['version'],
							'color'        => $i['color'],
                            'type'         => $i['type'],
                            'order_no'     => $i['order_no'],
							'qty'          => $qty,
							'key'          => $k,
					);	
				} else{
					$narray[$k] = array(
                            'model'        => $i['code'], 
						    'version'      => $i['version'],
							'color'        => $i['color'],
                            'type'         => $i['type'],
                            'order_no'     => $i['order_no'],
							'qty'          => $i['qty'],
							'key'          => $k,
					);								
				}
			}
            
            /* Break the array back down into individual items based on qty */            
            sort($narray);
			foreach($narray as $i) {
				for($x=0; $x<$i['qty']; $x++) {
					$myNewItems[] = array(
													'model'        => $i['model'],
												 	'version'      => $i['version'],
												 	'color'        => $i['color'],
                                                    'type'         => $i['type'],
                                                    'order_no'     => $i['order_no'],
                                                    'qty'          => '1',
												 );	
				}
			}
            
            unset($_SESSION['cart']['items']);
			$_SESSION['cart']['items'] = $myNewItems; 
            
            $this->updateDBCart();           
        }
        
        
        /** Update the cart table with the new items added to the users cart **/
        public function updateDBCart() {
            //$login = (isset($_SESSION['tempCustomer']['login']) ? $_SESSION['tempCustomer']['login'] : $_SESSION['cmd']['login']);
            db::query("DELETE FROM `cart` WHERE login='{$_SESSION['cmd']['login']}'");
            
            $cart = $_SESSION['cart']['items'];
            
            if(is_array($cart)) {
                foreach($cart as $item) {
                    $i = array(
                        'login'         => $_SESSION['cmd']['login'],
                        'model'         => $item['model'],
                        'version'       => $item['version'],
                        'color'         => $item['color'],
                        'type'          => $item['type'],
                        'order_no'      => $item['order_no'],
                        'qty'           => 1,
                    );
                    
                    db::db_perform("cart", $i);
                }
            }
        }
        
        
        /** This function will check that all items exist and delete the ones that do not **/
		public function checkItems() {
            $temparray = $_SESSION['cart']['items'];
            
			foreach($temparray as $key => $items) {
			    if($items['type'] == "O") {
				$test1 = db::num_rows("SELECT COUNT(id) AS stock, prod_code, version, color FROM `barcodes_barcodes` where cust_id='' AND order_id='' AND (`condition`='' OR `condition`=0) AND prod_code='{$items['model']}' AND version='{$items['version']}' AND color='{$items['color']}' GROUP BY prod_code, color, version");

                if (!$test1)
					$this->removeCartItem($key, $items);
                }
			}				
			return $_SESSION['cart']['items'];
            
		}
        
        
        /** Runs when a part does not exist, this will remove the item from users cart**/
		public function removeCartItem($key, $items) {
			unset($_SESSION['cart']['items'][$key]);
            //$login = (isset($_SESSION['tempCustomer']['login']) ? $_SESSION['tempCustomer']['login'] : $_SESSION['cmd']['login']);
			db::query("DELETE FROM `cart` WHERE login='{$_SESSION['cmd']['login']}' AND model='{$items['model']}' AND version='{$items['version']}' AND color='{$items['color']}'");
		}
        
        
        /** This function will check that all items exist and delete the ones that do not **/
		public function checkCartStock($final) { global $orders;
            $preoQty = 0;
            foreach($_SESSION['cart']['items'] as $key => $item) {
                if($item['type'] == "P") {
                    $preoQty = $preoQty + 1;
                }
            }
            $userID = (isset($_SESSION['tempCustomer']['customerID']) ? $_SESSION['tempCustomer']['customerID'] : $_SESSION['cmd']['customerID']);
            
			foreach($final as $key => $items) {
                if($items['type'] == "O") {
                    require_once('orders.class.php');
    				$stockCheck = db::fetch_row("SELECT COUNT(id) AS stock, prod_code, version, color FROM `barcodes_barcodes` where cust_id='' AND order_id='' AND (`condition`='' OR `condition`=0) AND prod_code='{$items['model']}' AND version='{$items['version']}' AND color='{$items['color']}' GROUP BY prod_code, color, version");
                    
                    $sorcheck = db::fetch_array("SELECT qty FROM `cart` WHERE model='{$items['model']}' AND version='{$items['version']}' AND color='{$items['color']}' AND type='SOR'");
                    $sorqty = 0;
                    foreach($sorcheck AS $a=>$b) {
                        $sorqty = $sorqty + $b['qty'];
                    }
                    
                    if ($items['model'] == $stockCheck['prod_code'] && $items['version'] == $stockCheck['version'] && $items['color'] = $stockCheck['color']) {
                        //$stockCheck['stock'] = $stockCheck['stock'] - $orders->getPreordersQuotesProcessing($items['model'], $items['version'], $items['color'], "W");
                        $stockCheck['stock'] = $stockCheck['stock'] - $orders->getPreordersQuotesProcessing($items['model'], $items['version'], $items['color'], "Q");
                        $stockCheck['newstock'] = $stockCheck['stock'] - $items['qty'] - $sorqty;
                        
                        if($stockCheck['newstock'] < "0") {
                            $dif = $final[$key]['qty'] - $stockCheck['stock'];
                            $final[$key]['qty'] = $final[$key]['qty'] - $dif;
                            $final[$key]['qty'] = $final[$key]['qty'] - $sorqty;
                            $final[$key]['qty_check'] = "yes"; 
                        }
                    }
                } elseif($items['type'] == "P") {//Use if you want to check stock if the user updates the preorder qty in the cart to incoming shipments
                    require_once('orders.class.php');
                    
                    /* START Get the sum of preorders a dealer currently has */
                    $currentPreorders = db::fetch_result("current_preorders", "SELECT sum(l_qty_sent) as current_preorders FROM `order_history` WHERE h_cust_no='$userID' AND h_req_date ='' AND h_type = 'P'");
                    
                    $preorders = PREORDER_LIMIT - $preoQty - $currentPreorders;
                    $allowedPreorders = PREORDER_LIMIT - $currentPreorders;
                    /* END Get the sum of preorders a dealer currently has */
                    
                    /* This can be used to limit the amount a dealer can preorder by the number of bikes we have coming on containers. Does not stop monopolisation of stock*/
                    $preorderQty = $orders->getBikePreorderQty($items['model'],$items['version'],$items['color']);//Get count of bikes coming in on shipment
                    $curPreorders = $orders->getPreordersQuotesProcessing($items['model'],$items['version'],$items['color'], "P");//Get current count of preorders for the bike
                    
                    $preorderQty = $preorderQty - $curPreorders;//minus current preoders
                    $preorderQty1 = $preorderQty - $curPreorders;//used as current preorder limit
                    
                    $preorderQty = $preorderQty - $items['qty'];//minus off the qty they want
                    
                    if($preorderQty < "0") {//If they want more then we have avaliable limit them to that
                        $final[$key]['qty'] = $preorderQty1;
                        $final[$key]['p_qty_check'] = "yes"; 
                    }
                    
                    if($final[$key]['qty'] > $allowedPreorders) {//If the qty they want is greater then the limit they are allowed put it to there limit
                        $final[$key]['qty'] = $allowedPreorders;
                        $final[$key]['p_qty_check'] = "yes"; 
                    }
                    
                } elseif($items['type'] == "SOR") {
                    /* START Get the sum of SORS a dealer currently has */
                    $currentsors = db::fetch_result("current_sor", "SELECT count(id) AS current_sor FROM `order_history` WHERE sor_confirm = '1' AND h_cust_no ='$userID' AND h_order_date BETWEEN NOW() - INTERVAL 90 DAY AND NOW()");
            
                    $sorlimit = db::fetch_result("sor_limit", "SELECT sor_limit FROM `dealers_login` WHERE customerID ='$userID'");
                    
                    $sorcount = 0;
                    foreach($_SESSION['cart']['items'] as $k => $i) {
                        if($i['type'] == "SOR") {
                            $sorcount = $sorcount + 1;
                        }
                    }
                    
                    $sors = ($sorlimit - $sorcount) - $currentsors;
                    $allowedSORs = $sorlimit - $currentsors;
                    
                    if($sors < 0) {
                        $final[$key]['qty'] = 1;
                        $final[$key]['sor_qty_check'] = "yes"; 
                    }
                    /* END Get the sum of SORS a dealer currently has */
                }
			}
            
            foreach($final as $i) {
				for($x=0; $x<$i['qty']; $x++) {
					$myNewItems[] = array(
													'model'        => $i['model'],
												 	'version'      => $i['version'],
												 	'color'        => $i['color'],
                                                    'type'         => $i['type'],
                                                    'order_no'     => $i['order_no'],
                                                    'qty'          => '1',
												 );	
				}
			}
            //echo"<pre>".print_r($myNewItems, true)."</pre>";
            //echo"<pre>".print_r($_SESSION['cart']['items'], true)."</pre>";die();
            if(count($_SESSION['cart']['items']) != count($myNewItems)) {
                unset($_SESSION['cart']['items']);
                $_SESSION['cart']['items'] = $myNewItems;
                $this->UpdateDBCart();
            }
            
            unset($_SESSION['cart']['items']);
            $_SESSION['cart']['items'] = $myNewItems;
            
            return $final;
		}
        
        
        /** Used to search the cart array for a match on model, version, color **/
        function searchArr($model, $version, $color, $array) {
           foreach ($array as $key => $val) {
               if ($val['model'] === $model && $val['version'] === $version && $val['color'] === $color) {
                   return $key;
               }
           }
           return null;
        }
        
        /** This function will go through the cart and merge the single items into arrays based on the model, version and color **/
        public function mergeCartItems() { global $stock, $price, $orders;
            require_once('stock.class.php');
            require_once('orders.class.php');
            $bikes = array();
            
            
            foreach($_SESSION['cart']['items'] as $code => $items) {
                                
        		if(@is_array($bikes[$items['model']][$items['version']][$items['color']][$items['type']][$items['order_no']])) {
        			$bikes[$items['model']][$items['version']][$items['color']][$items['type']][$items['order_no']]['qty']=
        				$bikes[$items['model']][$items['version']][$items['color']][$items['type']][$items['order_no']]['qty']+1;
        		} else {
        			$bikes[$items['model']][$items['version']][$items['color']][$items['type']][$items['order_no']]['qty']=1;
        		}
            }	
            
            foreach($bikes as $model => $a) {
            	foreach($a as $version => $b) {
            		foreach($b as $color => $c) {
                        foreach($c as $type => $d) {
                		    foreach($d as $orderno => $e) {
                				$final[]=array(
                					'model' => $model,
                					'version' => $version,
                					'color' => $color,
                                    'type' => $type,
                                    'order_no' => $orderno,
                					'qty' => $e['qty'],
                                );	
                            }
                        }
                    }	
                }	
            }
                        
            /* Check stock of items */
            $final = $this->checkCartStock($final);
            
            
            
            foreach($final as $nk => $ni) {
                if($ni['type'] == "warranty") {
                    $id = $this->searchArr($ni['model'], $ni['version'], $ni['color'], $final);
                    //echo $id;
                    $final[$id]['warranty'] = 24;
                    unset($final[$nk]);
                }
            }
            
            
            $time = "00000000000000";
            foreach ($final as $key => $item) {
                //$itemp = $price->createItemPrice($item, false, $_SESSION['cmd']['type'], $_SESSION['cmd']['currency']);
                //$linep = $price->createItemPrice($item, $item['qty'], $_SESSION['cmd']['type'], $_SESSION['cmd']['currency']);
                
                $type = (isset($_SESSION['tempCustomer']['type']) ? $_SESSION['tempCustomer']['type'] : isset($_SESSION['cmd']['type']) ? $_SESSION['cmd']['type'] : "retail");
                
                $final[$key]['item_price'] = $price->createItemPrice($item, false, $type, $_SESSION['cmd']['currency']);
                $final[$key]['line_price'] = $price->createItemPrice($item, $item['qty'], $type, $_SESSION['cmd']['currency']);
                
                if(isset($final[$key]['warranty'])) {
                    $final[$key]['warranty_price'] = $price->createExtraPrice($item['qty'], $_SESSION['cmd']['currency']);
                    $final[$key]['formatted_warranty_price'] = s::showPrice(array('value' => $final[$key]['warranty_price'], 'currency' => $_SESSION['cmd']['currency']));  
                }
                
                $final[$key]['formatted_item_price'] = s::showPrice(array('value' => $final[$key]['item_price'], 'currency' => $_SESSION['cmd']['currency']));
                $final[$key]['formatted_line_price'] = s::showPrice(array('value' => $final[$key]['line_price'], 'currency' => $_SESSION['cmd']['currency']));
                
                $final[$key]['currency'] = $_SESSION['cmd']['currency'];
                
                $final[$key]['description'] = $stock->getItemDescription($item['model']);
                $final[$key]['description']['color'] = $item['color'];
                
                if($item['type'] == "P") {
                    $final[$key]['unix_time'] = $orders->getNextAvailablePreOrderDate($item['model'], $item['version'], $item['color'], $item['qty']);
                    $final[$key]['due_date'] = ($final[$key]['unix_time'] ? date('d M Y', strtotime($final[$key]['unix_time'])) : "Unknown");
                }
                /* Use this to set the dispatch date of preorders to the latest date of the preorder for a particular item
                if($time < $final[$key]['unix_time']) {
                    $time = $final[$key]['unix_time'];
                }*/
            }
            /* Use this to set the dispatch date of preorders to the latest date of the preorder for a particular item
            foreach($final as $key => $item) {
                $final[$key]['unix_time'] = $time;
                $final[$key]['due_date'] = date('d M Y', strtotime($final[$key]['unix_time']));
            }*/
            
            return $final;
            
        }
        
        
        /** Find out if our cart has preorder items **/
        public function isPreorder($cart) {
            $preorder = false;
            
            foreach($cart as $key => $item) {
                if($item['type'] == "P") {
                    $preorder = true;
                }
            }
            
            return $preorder;
        }
    }

?>