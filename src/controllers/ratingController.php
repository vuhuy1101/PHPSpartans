<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\image_userModel;

session_start();
require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/image_userModel.php');	
require_once(dirname(__DIR__).'/configs/DB_Config.php');
require_once("Controller.php");
	
function processData()
{
	$model = new image_userModel();
	if($model->connectDB()){
		$result = $model->insertData($_POST['image_ID'], $_SESSION['user_id'], $_POST['rateOption']);
		header("Location: http://localhost/PHPSpartans/index.php");	
	}
}
	
if(isset($_POST["submit"]) && !empty($_POST["submit"])){
	processData();
}


