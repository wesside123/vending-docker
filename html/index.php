<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
/ endpoint is used to add and remove coins 
*/
require "inc/bootstrap.php";

//Separate the URI into an array
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode( '/', $uri );

//Test for '/inventory' endpoint
if ((isset($uri[1]) && $uri[1] != 'inventory' && $uri[1] != '')) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

require "Controller/Api/BeverageController.php";

//Set $strMethodName for BeverageController
$objFeedController = new BeverageController();

$strMethodName = "coins";
$objFeedController->{$strMethodName}();
?>