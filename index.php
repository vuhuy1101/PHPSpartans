<?php
<<<<<<< HEAD

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
=======
/**
* Main entry points into Image Rating Website
*/

//Needs to be PHPSpartans\hw3. Files aren't set up properly
namespace PHPSpartans;
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Image Rating </title>
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="src//styles//styles.css"/>
</head>
<body>
	<div id="wrapper">
	<h1>Image Rating <img src="src//resources//logo.jpg" alt="jelly logo"/> </h1>
		<div class="signup">
		<a href="src//views//SignIn.php"> Sign in </a><br>
		<a href="src//views//SignUp.php"> Sign up </a>
		</div>
	</div>
	<h2> Recent </h2>
	<h2> Popularity </h2>
</body>
</html>

>>>>>>> 9e352d5acc86ba8b1a77b301b563d8148b7d927a
