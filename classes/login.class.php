<?php

/**
 * @author Chris West
 * @copyright 2015
 */
    
    include("includes/password.php");
    $login = new login;
    
    class login {
        
        /**
         * Create account
         * @param array of data required for a new account, email_address, password etc
         * @return user inserted
         */
        public function createAccount($data) { global $db;
            $this->insertNewUser($data);            
            $this->insertAddress($data);
            $this->loginUser($data);
            
            if($data['remember']) {
                $this->setCookies($data);
            }
        }
        
        /**
         * Create a temporary account
         * @param array of data required for a new 
         * @return user inserted
         */
        public function createTempAccount($data) { global $db;
            $data['password'] = "britishchocolatebox";
            
            $this->insertNewUser($data);
                        
            $this->insertAddress($data);
            $this->loginUser($data);
            $this->setCookies($data);
        }


        /**
         * Insert new user into the DB
         * @param array of data required for a new account, email_address, password etc
         * @return user inserted
         */
        public function insertNewUser($data) { global $db;
            $insert = $db->query("INSERT INTO `users` (email_address, password, name, creation_date, last_login)
                        VALUES(:email_address, :password, :name, :creation_date, :last_login)", 
                        array(
                            'email_address'     => $data['email_address'],
                            'password'          => password_hash($data['password'], PASSWORD_BCRYPT, array("cost" => 11)),
                            'name'              => $data['name'],
                            'creation_date'     => date("YmdHis"),
                            'last_login'        => date("YmdHis"),
                        ));
        }
        

        /**
         * Insert new user address into the DB
         * @param array of data required for a new address, email_address, address etc
         * @return address inserted
         */
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
        

        /**
         * Update an address help in the database
         * @param array of data of new address
         * @return address updated
         */
        public function editAddress($data) { global $db;
            $insert = $db->query("UPDATE `addresses` SET name=:name, address_1=:address_1, address_2=:address_2, town=:town, county=:county, postcode=:postcode, county=:country 
                        WHERE email_address = :email_address",
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
        
        /**
         * Check if the user email already exists
         * @param $data containing the email address of the user
         * @return true or false
         */
        public function checkUser($data) { global $db;
            $user = $db->query("SELECT id FROM `users` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            
            if($user->id) {
                return true;
            } 
            return false;
        }
        
        /**
         * Set user cookies for logging in
         * @param array of data needed for cookies, email password etc
         * @return cookies set
         */
        public function setCookies($data) {
            setcookie( "emailAddress", $data['email_address'], strtotime( '+365 days' ) );
            setcookie( "password", password_hash($data['password'], PASSWORD_BCRYPT, array("cost" => 11)), strtotime( '+365 days' ) );
        }
        
        /**
         * Log a user in
         * @param array $data contains the form input return containing email and password for comparison
         * @return true or false if user logged in
         */
        public function loginUser($data) { global $db;
        
            // Get the password from the database and compare it to a variable
            $passwordFromPost = $data['password'];
            $passwordFromDatabase = $db->row("SELECT password FROM `users` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            $hashedPasswordFromDB = $passwordFromDatabase['password'];
            
            if (password_verify($passwordFromPost, $hashedPasswordFromDB)) { // compare
                $this->setSession($data);
                return true;
            } else {
                return false;
            }
        }
        
        /**
         * Set our session variables
         * @param array of data containing user email for storing data in session
         * @return session populated with our data
         */
        public function setSession($data) { global $db;
            $checkoutSession = $_SESSION['checkout'];
            $currentSession = $_SESSION;
            
            // Destroy our sessions first
            $this->destroySession();
            $this->startSession();
            
            $user = $db->row("SELECT * FROM `users` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            $address = $db->row("SELECT * FROM `addresses` WHERE email_address = :email_address", array("email_address" => $data['email_address']));
            
            $_SESSION = $currentSession;
            $_SESSION['user'] = $user;
            $_SESSION['address'] = $address;
            $_SESSION['checkout'] = $checkoutSession;
        }
        
        /**
         * Find out if a user is logged in
         * @return true or false depending if the user is logged in
         */
        public function isLoggedIn() {
            if(isset($_SESSION['user']['email_address'])) {
                return true;
            }
            return false;
        }

        /**
         * Destroy our session
         */
        public function destroySession() {
            $_SESSION = array();
            session_destroy();
        }
        /**
         * Start a new session
         */
        public function startSession() {
            session_start();
        }
    }

?>
