<?php

namespace PHPSpartans\hw3;

require_once("src/controllers/websiteController.php");

define("NS_BASE", "PHPSpartans\\hw3\\");
define(NS_BASE . "NS_CONTROLLERS","PHPSpartans\\hw3\\controllers\\");
define(NS_BASE . "NS_VIEWS","PHPSpartans\\hw3\\views\\");

$allowed_controllers = ["website"];

$controller_name = NS_CONTROLLERS . "websiteController";	

//instatiate controller for request
$controller = new $controller_name();
//process request
$controller->processRequest();
	
?>