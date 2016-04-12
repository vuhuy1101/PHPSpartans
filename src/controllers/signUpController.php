<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\userModel;
	
require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/userModel.php');
require_once(dirname(__DIR__).'/configs/DB_Config.php');
require_once("Controller.php");

	/**
	* Controller calls model to sign up user.
	*
	*/
function processUserDataSignUp()
{
	
	if(isset($_POST["submit"])) {
		$userModel = new userModel();
		$checkDB = $userModel->connectDB();
		if($checkDB == true){
			$userModel->SignUp();
			$userModel->closeDB();
		}
	}
}

	/**
	* Controller calls model to sign user in.
	*
	*/
function processUserDataSignIn()
{
	if(isset($_GET["signIn"])) {
		$userModel = new userModel();
		$checkDB = $userModel->connectDB();
		if($checkDB == true){
			$userModel->checkUser();
			$userModel->closeDB();
		}
	}
}

if(isset($_POST["submit"]) && !empty($_POST["submit"])){
	processUserDataSignUp(); 
}

if(isset($_GET["signIn"]) && !empty($_GET["signIn"])){
	processUserDataSignIn(); 
}

?>