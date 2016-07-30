<?php

/**
 * @author lolkittens
 * @copyright 2015
 */
    
    include("includes/password.php");
    $login = new login;
    
    class login {
        
        public function createAccount($data) { global $db;
            $insert = $db->query("INSERT INTO `users` (email_address, password, name, creation_date, last_login)
                        VALUES(:email_address, :password, :name, :creation_date, :last_login)", 
                        array(
                            'email_address'     => $data['email_address'],
                            'password'          => password_hash($data['password'], PASSWORD_BCRYPT, array("cost" => 11)),
                            'name'              => $data['name'],
                            'creation_date'     => date("YmdHis"),
                            'last_login'        => date("YmdHis"),
                        ));
            
            $this->insertAddress($data);
            $this->loginUser($data);
            
            if($data['remember']) {
                $this->setCookies($data);
            }
        }
        
        public function createTempAccount($data) { global $db;
            //$data['email_address'] = uniqid();
            $data['password'] = "britishchocolatebox";
            
            $insert = $db->query("INSERT INTO `users` (email_address, password, name, creation_date, last_login)
                        VALUES(:email_address, :password, :name, :creation_date, :last_login)", 
                        array(
                            'email_address'     => $data['email_address'],
                            'password'          => password_hash($data['password'], PASSWORD_BCRYPT, array("cost" => 11)),
                            'name'              => $data['name'],
                            'creation_date'     => date("YmdHis"),
                            'last_login'        => date("YmdHis"),
                        ));
                        
            $this->insertAddress($data);
            $this->loginUser($data);
            $this->setCookies($data);
        }
        
        public function insertAddress($data) { global $db;
            $insert = $db->query("INSERT INTO `addresses` (name, email_address, address_1, address_2, town, county, postcode, country) 
                        VALUES(:name, :email_address, :address_1, :address_2, :town, :county, :postcode, :country)",
                        array(
                            'name'              => $data['name'],
                            'email_address'     => $data['email_address'],
                            'address_1'         => $data['address_1'],
                            'address_2'         => $data['address_2'],
                            'town'              => $data['town'],
                            'county'            => $data['state'],
                            'postcode'          => $data['postcode'],
                            'country'           => $data['country']
                        ));
        }
        
        public function editAddress($data) { global $db;
            $insert = $db->query("UPDATE `addresses` SET name=:name, address_1=:address_1, address_2=:address_2, town=:town, county=:county, postcode=:postcode, county=:country WHERE email_address = :email_address",
                        array(
                            'name'              => $data['name'],
                            'email_address'     => $_SESSION['user']['email_address'],
                            'address_1'         => $data['address_1'],
                            'address_2'         => $data['address_2'],
                            'town'              => $data['town'],
                            'county'            => $data['state'],
                            'postcode'          => $data['postcode'],
                            'country'           => $data['country']
                        ));
                        
            $address = $db->row("SELECT * FROM `addresses` WHERE email_address = :email_address", array("email_address" => $_SESSION['user']['email_address']));
            $_SESSION['address'] = $address;
        }
        
        public function checkUser($data) { global $db;
            $user = $db->query("SELECT id FROM `users` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            
            if($user->id) {
                return true;
            } 
            return false;
        }
        
        public function setCookies($data) {
            setcookie( "emailAddress", $data['email_address'], strtotime( '+365 days' ) );
            setcookie( "password", password_hash($data['password'], PASSWORD_BCRYPT, array("cost" => 11)), strtotime( '+365 days' ) );
        }
        
        public function loginUser($data) { global $db;
        
            // Get the password from the database and compare it to a variable (for example post)
            $passwordFromPost = $data['password'];
            $passwordFromDatabase = $db->row("SELECT password FROM `users` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            $hashedPasswordFromDB = $passwordFromDatabase['password'];
            
            if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
                $this->setSession($data);
                return true;
            } else {
                return false;
            }
        }
        
        public function setSession($data) { global $db;
            $checkoutSession = $_SESSION['checkout'];
            $currentSession = $_SESSION;
            
            $this->destroySession();
            $this->startSession();
            
            $user = $db->row("SELECT * FROM `users` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            $address = $db->row("SELECT * FROM `addresses` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            
            $_SESSION = $currentSession;
            $_SESSION['user'] = $user;
            $_SESSION['address'] = $address;
            $_SESSION['checkout'] = $checkoutSession;
        }
        
        public function isLoggedIn() {
            if(isset($_SESSION['user']['email_address'])) {
                return true;
            }
            return false;
        }
        
        public function destroySession() {
            $_SESSION = array();
            session_destroy();
        }
        
        public function startSession() {
            session_start();
        }
    }

?>