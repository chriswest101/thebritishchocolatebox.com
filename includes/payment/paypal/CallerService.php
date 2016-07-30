<?php


	define('PP_API_USERNAME', 		'me_api1.christophermwest.co.uk');
	define('PP_API_PASSWORD', 		'RG7MDJN49QTCAL3B');
	define('PP_API_SIGNATURE', 		'AFcWxV21C7fd0v3bYYYRCpSSRl31ABmmJbhQv3ydV-ThCiyRR04gJuDS');
	define('PP_API_ENDPOINT', 		'https://api-3t.paypal.com/nvp');
	define('PP_PAYPAL_URL', 		'https://www.paypal.com/webscr&cmd=_express-checkout&token=');
	define('PAYPAL_URL', 		    'https://www.paypal.com/webscr&cmd=_express-checkout&token=');
    
	define('PP_SUBJECT', 				'');
	define('PP_USE_PROXY', 				FALSE);
	define('PP_PROXY_HOST', 			'127.0.0.1');
	define('PP_PROXY_PORT', 			'808');
	define('PP_VERSION', 				'65.1');
	define('ACK_SUCCESS', 				'SUCCESS');
	define('ACK_SUCCESS_WITH_WARNING', 	'SUCCESSWITHWARNING');
	define('PP_AUTH_MODE',				'3TOKEN');
	
	class payPalClass {
		
		public function caller($methodName, $str) {
			$header = "&PWD=".urlencode(PP_API_PASSWORD)."&USER=".urlencode(PP_API_USERNAME)."&SIGNATURE=".urlencode(PP_API_SIGNATURE);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, PP_API_ENDPOINT);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);

			// turning off the server and peer verification(TrustManager Concept).
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
	
			$str = $header.$str;
			
			if (PP_USE_PROXY)
				curl_setopt ($ch, CURLOPT_PROXY, PP_PROXY_HOST.":".PP_PROXY_PORT);
				
			if (strlen(str_replace('VERSION=', '', strtoupper($str))) == strlen($str))
				$str = "&VERSION=" . urlencode(PP_VERSION) . $str;
				
			$req = "METHOD=".urlencode($methodName).$str;
			
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
			
			$response = curl_exec($ch);
			
			$resArray = payPalClass::deformat($response);
			$reqArray = payPalClass::deformat($req);
			
			// $_SESSION['reqArray'] = $reqArray;
			
			if (curl_errno($ch)) {
				$_SESSION['curl_error_no'] = curl_errno($ch);
				$_SESSION['curl_error_msg'] = curl_error($ch);
				
				$location = "APIError.php";
		  		header("Location: $location");
  			} else {
				curl_close($ch);
			}
			
			return array_merge($resArray, $reqArray);
		}
		
		private function deformat($str) {
			$intial = 0;
			$array = array();
			
			while(strlen($str)) {
				$keypos = strpos($str,'=');
				$valuepos = strpos($str,'&') ? strpos($str,'&'): strlen($str);
				
				$keyval = substr($str, $intial, $keypos);
				$valval = substr($str, $keypos + 1, $valuepos - $keypos - 1);
				$array[urldecode($keyval)] = urldecode($valval);
				$str = substr($str, $valuepos + 1, strlen($str));
			}
			
			return $array;
		}
	}

?>
