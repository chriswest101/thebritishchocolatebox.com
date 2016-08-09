<?php

/**
 * @author Chris West
 * @copyright 2015
 */
    
    error_reporting(E_ERROR | E_WARNING);
    ini_set("display_errors", 1);
    
    if(!defined("BCB")) {
        exit();
    }
    
    session_start();
    
    require("classes/db.class.php");
	$db = new DB;
    
    require_once("classes/Smarty/Smarty.class.php");
    $smarty = new Smarty;
    $smarty->registerPlugin("function","priceFormat", "priceFormat");   
    
    require_once("classes/display.class.php");
    
    /*
    $csvData = file_get_contents("includes/counties.csv");
    $lines = explode(PHP_EOL, $csvData);
    $array = array();
    foreach ($lines as $line) {
        $array[] = str_getcsv($line);
    }
    echo "<pre>".print_r($array, true)."</pre>";
    foreach($array as $key => $value) {
        if($key != 0) {
            $db->query("INSERT INTO `counties` (county) VALUES('{$value[1]}')");
        }
    }
    */
    
    // SET GLOBAL VARIABLES
    setDefines();
    /**
     * Define our constant globals from the donfig table
     * @return assign vars to contants
     */
    function setDefines() { global $db, $smarty;
        $data = $db->query("SELECT * FROM `configs`");
        
        foreach($data as $key => $value) {
            if(!defined($value['name'])) {
                define($value['name'], $value['value']);
                $smarty->assign($value['name'], $value['value']);
            }
        }
    }
    
    // GET CURRENY CONVERSION RATE
    getGeoLocation();
    /**
     * Get the geoloaction of a user based on there IP
     * @return geo location of user
     */
    function getGeoLocation() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $json = file_get_contents("http://freegeoip.net/json/$ip"); // this WILL do an http request for you
        $data = json_decode($json);
        getExchangeRate($data->country_code);
    }
    /**
     * Get the exchange rate that we need to use based on there location using yahoo finance site
     * @param string location of user
     * @return float currency conversion rate
     */
    function getExchangeRate($location) { global $db;
        $currency = $db->query("SELECT currency FROM `countries` WHERE country_code = '$location'");
        if($location != "GB") {
            $data = file_get_contents("http://download.finance.yahoo.com/d/quotes.csv?s=GBP{$currency[0]['currency']}=X&f=sl1d1t1ba&e=.csv");
            $rows = explode("\n",$data);
            $s = array();
            foreach($rows as $row) {
                $s[] = str_getcsv($row);
            }
            
            $currentRate = ($s[0][1]);
            $_SESSION['currency_conversion_rate'] = $currentRate;
        } else {
            $currentRate = 1;
            $_SESSION['currency_conversion_rate'] = $currentRate;
        }
        getCurrency($location);
        
        return $currentRate;
    }
    /**
     * Get the currency symbol based on location
     * @param string location
     * @return array of currency info, symbol and name
     */
    function getCurrency($location) { global $db;
        if($location != "GB") {
            $currency = $db->query("SELECT currency, currency_symbol FROM `countries` WHERE country_code = '$location'");
            $_SESSION['currency'] = $currency[0]['currency'];
            $_SESSION['currency_symbol'] = $currency[0]['currency_symbol'];
        } else {
            $currency = "GBP";
            $_SESSION['currency'] = "GBP";
            $_SESSION['currency_symbol'] = "&pound;";
        }
        
        $_SESSION['location'] = $location;
        
        return $currency;
    }
    
    // PRICE FORMAT FOR TEMPLATES
    /**
     * This fucntion is used in the template files to format prices with currency
     * @param array $params is the array of params used to create the formatted price, css class, value, currency
     * @return html of formatted currency
     */
	function priceFormat($params, $smarty) {
		$class = empty($params['class']) ? 'price' : $params['class'];
		$currency = $params['currency'];
        $params['value'] = $params['value'] * ($currency != "GBP" ? $_SESSION['currency_conversion_rate'] : 1);
		$temp = explode(".", sprintf("%01.2f", $params['value']));
        
		return "<span class=\"retail$class\">{$_SESSION['currency_symbol']}<span>{$temp[0]}</span>.{$temp[1]}</span>";
	}
    
?>