<?php

namespace PHPSpartans\hw3;

require_once("src/controllers/websiteController.php");
require_once("src/controllers/signUpController.php");
require_once("src/controllers/signUpFormController.php");
require_once("src/controllers/uploadController.php");
require_once("src/controllers/uploadFormController.php");

// defines for various namespaces
define("NS_BASE", "PHPSpartans\\hw3\\");
define(NS_BASE . "NS_CONTROLLERS","PHPSpartans\\hw3\\controllers\\");
define(NS_BASE . "NS_VIEWS","PHPSpartans\\hw3\\views\\");
define(NS_BASE . "NS_MODELS","PHPSpartans\\hw3\\models\\");

$allowed_controllers = ["website","uploadForm", "upload","signUpForm", "signUp"];
//determine controller for request
if (!empty($_REQUEST['controller']) && in_array($_REQUEST['controller'], $allowed_controllers)) {
    $controller_name = NS_CONTROLLERS . $_REQUEST['controller']. "Controller";
	//instatiate controller for request
	$controller = new $controller_name();
	//process request
	$controller->processRequest($_REQUEST['controller']);
} else {
	$controller_name = NS_CONTROLLERS . "websiteController";
	
	//instatiate controller for request
	$controller = new $controller_name();
	
	//process request
	$controller->processRequest();
}

	
?>
