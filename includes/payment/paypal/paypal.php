<?php

/**
 * @author Chris West
 * @copyright 2015
 */

    class paypal {
            /**
             * Send paypal payment request and redirect or catch if they have gone through paypal process
             */
            public function processPayPal() { global $db;             
                
                $_SESSION['checkout']['paymentMethod'] = "paypal";
                // CART
                // PAYMENT
                // CONFIRM
                // COMPLETE
                require_once('includes/payment/paypal/CallerService.php');
        	
        		/* An express checkout transaction starts with a token, that
        		   identifies to PayPal your transaction
        		   In this example, when the script sees a token, the script
        		   knows that the buyer has already authorized payment through
        		   paypal.  If no token was found, the action is to send the buyer
        		   to PayPal to first authorize payment
        		*/
                
        		$token = isset($_SESSION['checkout']['paypal']['token']) ? true : false;
                
        		if(!isset($_SESSION['checkout']['paypal']['token'])) {
        			
        			/* The servername and serverport tells PayPal where the buyer
        	   		should be directed back to after authorizing payment.
        	   		In this case, its the local webserver that is running this script
        	   		Using the servername and serverport, the return URL is the first
        	   		portion of the URL that buyers will return to after authorizing payment
        	   		*/
                    
                    /*
                    RECIPIENT
                    HOUSE_NUMBER STREET_NAME [STREET_TYPE] [STREET_DIRECTION] [BUILDING] [FLOOR] [APARTMENT]
                    LOCALITY PROVINCE_ABBREVIATION POSTAL_CODE
                    UNITED STATES
                    */
                    /*
                    RECIPIENT
                    [FLOOR] [APARTMENT]
                    [BUILDING]
                    [HOUSE_NUMBER] STREET_NAME
                    [DEPENDENT_LOCALITY]
                    LOCALITY
                    POSTAL_CODE
                    UNITED KINGDOM
                    */
                                                 
                    $serverName 				= $_SERVER['SERVER_NAME'];
        			$serverPort 				= $_SERVER['SERVER_PORT'];
                    $url						= dirname('https://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
                    $paymentType				= "Sale";
        			$amt		 		  		= number_format($_SESSION['checkout']['totals']['gross_total'], 2);
        			
                    
                    // CUSTOMERS ADDRESS
        		    $address = $_SESSION['address'];
                    
        			$personName        			= $address['name'];
        			$SHIPTOSTREET      			= $address['address_1'].(isset($address['address_2']) ? ", ".$address['address_2'] : "").(isset($address['address_3']) ? ", ".$address['address_3'] : "");
        		   	$SHIPTOCITY        			= $address['town'];
        		   	$SHIPTOSTATE	      		= $address['county'];
        		   	$SHIPTOCOUNTRYCODE 			= $_SESSION['location'];
        		   	$SHIPTOZIP         			= $address['postcode'];
                    
                    $shipper = $db->row("SELECT * FROM `couriers` WHERE id = :id", array("id"=>$_SESSION['checkout']['delivery']['id']));
                    
        			$shippingName				= $shipper['courier_name'];
        			$L_SHIPPINGOPTIONLABEL0 	= $shipper['courier_name'] ? $shipper['courier_name'] : "Delivery Charge";
        		   	$L_SHIPPINGOPTIONAMOUNT0	= number_format($_SESSION['checkout']['totals']['delivery'],2);
        		   	$SHIPPINGAMT         		= number_format($_SESSION['checkout']['totals']['delivery'],2);
                    
                    
                    $itemamt 					= 0.00;
        	   		$i                          = 0;
                    $ITEM_COUNT                 = 0;
                    
                    /* Loop through the items and create an array of items with name price and qty of each */
        	   		foreach ($_SESSION['checkout']['items'] as $key => $product) {
           				
        				$items[$i]['L_NAME']	= $product['name'];
        				$items[$i]['L_AMT']		= number_format(($product['sale_total'] != 0.00 ? $product['sale_total'] : $product['price_total']), 2);
        				$items[$i]['L_QTY']		= $product['qty'];
        
        				$itemamt 				+= ($product['sale_total'] != 0.00 ? $product['sale_total'] : $product['price_total']) * $product['qty'];
        				$i++;
        				$ITEM_COUNT++;
        	   		}
                   
                    /* The returnURL is the location where buyers return when a
        			payment has been succesfully authorized.
        			The cancelURL is the location buyers are sent to when they hit the
        			cancel button during authorization of payment during the PayPal flow
        			*/
        			$base = "https://www.thebritishchocolatebox.com/checkout.php";
        	   	
        	   		$returnURL	= urlencode("$base?confirm&paypal&paymentType=$paymentType");
        	   		$cancelURL 	= urlencode("$base");
                    
                    /* Construct the parameter string that describes the PayPal payment
        			the varialbes were set in the web form, and the resulting string
        			is stored in $nvpstr
        			*/
        
        	        $nvpstr				= "";
        			   
               		/*
                	* Setting up the Shipping address details
                	*/
        	
        	        $shiptoAddressArr[] = "&SHIPTONAME=".urlencode($personName);
        	        $shiptoAddressArr[] = "SHIPTOSTREET=".urlencode($SHIPTOSTREET);
        	        $shiptoAddressArr[] = "SHIPTOCITY=".urlencode($SHIPTOCITY);
        	        $shiptoAddressArr[] = "SHIPTOSTATE=".urlencode($SHIPTOSTATE);
        	        $shiptoAddressArr[] = "SHIPTOCOUNTRYCODE=".urlencode($SHIPTOCOUNTRYCODE);
        	        $shiptoAddressArr[] = "SHIPTOZIP=".urlencode($SHIPTOZIP);
        
               		$shiptoAddress 		= implode('&',$shiptoAddressArr);
        
               		$nvpArr[] = "&ADDRESSOVERRIDE=1$shiptoAddress";
                    
        			$amt = $itemamt + $SHIPPINGAMT;
                    
                    // CURRENCY
    				$currencyCodeType = $_SESSION['currency'];
    		   		foreach ($items as $key => $item) {
    					$nvpArr[] = "L_NAME".$key."=".urlencode($item['L_NAME']);
    					$nvpArr[] = "L_AMT".$key."=".number_format($item['L_AMT'],2);
    					$nvpArr[] = "L_QTY".$key."=".$item['L_QTY'];				
    		   		}           
    			   	
    	           	$nvpArr[] = "MAXAMT=".number_format($amt,2);
    	           	$nvpArr[] = "AMT=".number_format($amt,2);
    	           	$nvpArr[] = "ITEMAMT=".number_format($itemamt,2);
    	
    	           	$nvpArr[] = "L_SHIPPINGOPTIONAMOUNT0=".number_format($L_SHIPPINGOPTIONAMOUNT0,2);
    	           	$nvpArr[] = "L_SHIPPINGOPTIONLABEL0=".urlencode($L_SHIPPINGOPTIONLABEL0);
    	           	$nvpArr[] = "L_SHIPPINGOPTIONNAME0=".urlencode($L_SHIPPINGOPTIONLABEL0);
    	           	$nvpArr[] = "L_SHIPPINGOPTIONISDEFAULT0=true";
    	           	$nvpArr[] = "SHIPPINGAMT=".number_format($SHIPPINGAMT,2);
         			
                    
                    $nvpArr[] = "ReturnUrl=".$returnURL;
                   	$nvpArr[] = "CANCELURL=".$cancelURL;
                   	$nvpArr[] = "CURRENCYCODE=".$currencyCodeType;
                   	$nvpArr[] = "PAYMENTACTION=".$paymentType;
                    
                    $nvpstr = implode('&',$nvpArr);
        
               		$nvpstr = $nvpHeader.$nvpstr;
                    
                    /* Make the call to PayPal to set the Express Checkout token
        			If the API call succeded, then redirect the buyer to PayPal
        			to begin to authorize payment.  If an error occured, show the
        			resulting errors
        			*/
                    
                    /*
               		echo "<H2>callerservice</h2>\$API_Endpoint = $API_Endpoint<br>\$version = $version<br />\$API_UserName = $API_UserName<br>\$API_Password = $API_Password<br>
               		\$API_Signature = $API_Signature<br>\$nvp_Header = $nvp_Header<br>\$subject = $subject<br>\$AUTH_token = $AUTH_token<br>\$AUTH_signature = $AUTH_signature
               		\$AUTH_timestamp = $AUTH_timestamp";
               		*/
                    //echo "<pre>".print_r($nvpArr, true)."</pre>";die();
                    
                    $resArray=payPalClass::caller("SetExpressCheckout", $nvpstr);
        	   		
        	   		$_SESSION['reshash']=$resArray;
        
        	   		$ack = strtoupper($resArray["ACK"]);
                    
                    // DIRECT TO PAYPAL TO COMPLETE TRANSACTION
                    if($ack == "SUCCESS") {
        				// Redirect to paypal.com here
        				$token = urldecode($resArray["TOKEN"]);
        				$payPalURL = PAYPAL_URL.$token;
        				header("Location: ".$payPalURL);
        				exit();
                    // DIRECT TO PAYMENTS STAGE WITH ERROR
        			} else {
        			    $_SESSION['checkout']['error'] = "There has been an error please try agian or use a different payment method";
                        return false;
        			}
                } else {
        	 		/* At this point, the buyer has completed in authorizing payment
        			at PayPal.  The script will now call PayPal with the details
        			of the authorization, incuding any shipping information of the
        			buyer.  Remember, the authorization is not a completed transaction
        			at this state - the buyer still needs an additional step to finalize
        			the transaction
        			*/
        
        	   		$token 		= urlencode($_SESSION['checkout']['paypal']['token']);
        
        		 	/* Build a second API request to PayPal, using the token as the
        			ID to get the details on the payment authorization
        			*/
        	   		$nvpstr 	= "&TOKEN=".$token;
        
        	   		$nvpstr 	= $nvpHeader.$nvpstr;
        	 		/* Make the API call and store the results in an array.  If the
        			call was a success, show the authorization details, and provide
        			an action to complete the payment.  If failed, show the error
        			*/
        	   		$resArray	= payPalClass::caller("GetExpressCheckoutDetails",$nvpstr);
        	   		$_SESSION['reshash'] = $resArray;
        	   		$ack		= strtoupper($resArray["ACK"]);
                    
                    //echo"<pre>".print_r($resArray, true)."</pre>";die();
                    
        	   		if($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
                        $_SESSION['checkout']['token'] 			= $resArray['TOKEN'];
            			$_SESSION['checkout']['payer_id'] 		= $resArray['PAYERID'];
            			$_SESSION['checkout']['currCodeType'] 	= $resArray['PAYMENTREQUEST_0_CURRENCYCODE'];
                        
                        return true;
        		  	} else {
        				//Redirecting to display errors.
        				$this->payPalProAPIError("Payment");
                        return false;
        		  	}
        		}
            }
            
            /**
             * Email paypal payent error
             * @param string $stage is stage of checkout user was on
             * @return false
             */
            public function payPalProAPIError($stage = "Unkown"){
    
    			$resArray = $_SESSION['reshash'];
        
    			$message = "The PayPal API caused an error:\n\n";
    
    			if(isset($_SESSION['curl_error_no'])) {
    				$errorCode = $_SESSION['curl_error_no'] ;
    				$errorMessage = $_SESSION['curl_error_msg'] ;
    
    				$message .= "Error Number: ".$errorCode."\n";
    				$message .= "Error Message: ".$errorMessage."\n";
    			}
                
                $message .= "======================================================\n\n";
    			$message .= print_r($_SESSION, true);
    
    			require_once('classes/sendmail.class.php');
    			$mail = new sendMail;
                $this->subject = "Paypal Pro API ERROR";
                
                $email_message = addslashes($mail->emailBody("blank"));
                eval("\$email_message = \"$email_message\";");
    		    $mail->send($email_message, "support@thebritishchocolatebox.com");
                
    			unset($_SESSION['reshash'], $_SESSION['token'], $_SESSION['payer_id'], $_SESSION['nvpReqArray']);
    
	  			$_SESSION['checkout']['error'] = "An error occurred while sending the transaction to PayPal. Our support team has been notified of this and will resolve the issue as soon as possible.";
                
	  			return false;
    		}
            
            /**
             * Send request for paypal payment
             * @param string $orderID
             * @return true or false depending on if transaction was successful
             */
    		public function processPayPalPayment($orderID) { global $db;
    		  
    			require_once("includes/payment/paypal/CallerService.php");
                
    			$paypal 			= new payPalClass;
    			$token 				= urlencode($_SESSION['checkout']['token']);
    			$paymentType 		= "Sale";
    			$currCodeType 		= urlencode($_SESSION['checkout']['currCodeType']);
    			$payerID 			= urlencode($_SESSION['checkout']['payer_id']);
    			$serverName 		= urlencode($_SERVER['SERVER_NAME']);
    			$paymentAmount		= urlencode($_SESSION['checkout']['totals']['gross_total']);
                
    			$str = "&TOKEN=$token&PAYERID=$payerID&AMT=$paymentAmount&PAYMENTACTION=$paymentType&CURRENCYCODE=$currCodeType&IPADDRESS=$serverName";
    			
                $resArray = $paypal->caller("DoExpressCheckoutPayment", $str);
                
                $_SESSION['checkout']['paypalDetail'] = $resArray;
                
    			$ack = strtoupper($resArray["ACK"]);
                
                // Insert a log into the paypal logs table
                $insert = $db->query("INSERT INTO `paypal_pro_api` (order_id, email_address, token, transaction_id, payer_id, payment_type, value, currCodeType, txtime, ack, transaction_type, payment_type2, payment_status, pending_reason, reason_code, address_status) 
                        VALUES(:order_id, :email_address, :token, :transaction_id, :payer_id, :payment_type, :value, :currCodeType, :txtime, :ack, :transaction_type, :payment_type2, :payment_status, :pending_reason, :reason_code, :address_status)",
                        array(
            				'order_id' 			=> $orderID,
            	        	'email_address' 	=> $_SESSION['user']['email_address'],
            				'token' 			=> $token,
            				'transaction_id' 	=> $resArray['TRANSACTIONID'],
            				'payer_id' 			=> $payerID,
            				'payment_type' 		=> $paymentType,
            				'value' 			=> $paymentAmount,
            				'currCodeType' 		=> $currCodeType,
            				'txtime'			=> date('YmdHis'),
            				'ack' 				=> $resArray['ACK'],
            				'transaction_type' 	=> $resArray['TRANSACTIONTYPE'],
            				'payment_type2' 	=> $resArray['PAYMENTTYPE'],
            				'payment_status' 	=> $resArray['PAYMENTSTATUS'],
            				'pending_reason'	=> $resArray['PENDINGREASON'],
            				'reason_code' 		=> $resArray['REASONCODE'],
            				'address_status' 	=> $_SESSION['reshash']['ADDRESSSTATUS'],
            			));
                
    
    			// API Error
    			if ($ack != 'SUCCESS' && $ack != 'SUCCESSWITHWARNING') {
                    $_SESSION['checkout']['paymentHandler'] = array(
                        'success'       => false,
                    ); 
    	  			$_SESSION['checkout']['error'] = "There was a problem with the PayPal Payment, please try again.";
    		  		return false;			
    			} else {
    			    $_SESSION['checkout']['paymentHandler'] = array(
                        'success'       => true,
                    ); 
                    // Insert order payment log
                    $insert = $db->query("INSERT INTO `order_payments` (order_id, pay_type, pay_ref, pay_ref2, amount, currency, taken_by, timestamp, status) 
                        VALUES(:order_id, :pay_type, :pay_ref, :pay_ref2, :amount, :currency, :taken_by, :timestamp, :status)",
                        array(
        					'order_id'    => $ordId,
        					'pay_type'    => 'paypal',
        					'pay_ref'     => $resArray['TRANSACTIONID'],
        					'pay_ref2'    => $_SESSION['checkout']['paypalDetail']['EMAIL'],
        					'amount'      => $paymentAmount,
        	 				'currency'    => $currCodeType,
        					'taken_by'    => 'paypal',
        					'timestamp'   => date("YmdHis"),
        					'status'      => '',
        				));
                    
    				return true;
    			}
    		}
      }

?>