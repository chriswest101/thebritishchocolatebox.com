<?php

/**
 * @author British Chocolate Box
 * @copyright 2015
 */
    $order = new order;
    
    class order {
        
        public function generateOrderID() { global $db;
            // Generate Order ID
            $db->query("INSERT INTO `order_ids` (foo) VALUES(:foo)", array('foo' => true));
            return $db->lastInsertId();
        }
        
        public function createOrder($orderID) { global $db;
            
            // Insert Order
            $insert = $db->query("INSERT INTO `orders` (order_id, email_address, order_date, dispatch_date, delivery_address_id, delivery_id) 
                        VALUES(:order_id, :email_address, :order_date, :dispatch_date, :delivery_address_id, :delivery_id)",
                        array(
                            'order_id'              => $orderID,
                            'email_address'         => $_SESSION['user']['email_address'],
                            'order_date'            => date("YmdHis"),
                            'dispatch_date'         => "",
                            'delivery_address_id'   => $_SESSION['address']['id'],
                            'delivery_id'           => $_SESSION['checkout']['delivery']['id']
                        ));
            // Insert Order Totals
            $insert = $db->query("INSERT INTO `order_totals` (order_id, order_discount, order_delivery, order_vat, order_gross) 
                        VALUES(:order_id, :order_discount, :order_delivery, :order_vat, :order_gross)",
                        array(
                            'order_id'                  => $orderID,
                            'order_discount'            => $_SESSION['checkout']['totals']['savings_total'],
                            'order_delivery'            => $_SESSION['checkout']['totals']['delivery'],
                            'order_vat'                 => $_SESSION['checkout']['totals']['order_vat'],
                            'order_gross'               => $_SESSION['checkout']['totals']['gross_total'],
                        ));
                        
            // Insert Order Items
            foreach($_SESSION['checkout']['items'] as $key => $item) {
                $insert = $db->query("INSERT INTO `order_items` (order_id, prod_code, price, qty) 
                        VALUES(:order_id, :prod_code, :price, :qty)",
                        array(
                            'order_id'      => $orderID,
                            'prod_code'     => $item['prod_code'],
                            'price'         => $item['sale_total'] != 0.00 ? $item['sale_total'] : $item['price_total'],
                            'qty'           => $item['qty']
                        ));
            }
            
            return $orderID;
        }
    }

?>