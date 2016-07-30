<?php

/**
 * @author British Chocolate Box
 * @copyright 2015
 */

    if(!defined("BCB")) {
        exit();
    }
    
    session_start();
    
    require("classes/db.class.php");
	$db = new DB;
    
    require_once("classes/Smarty.class.php");
    $smarty = new Smarty;
    
    require_once("classes/display.class.php");
?>