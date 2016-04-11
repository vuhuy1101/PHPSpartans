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
		$check = $model->retrieveData($_POST['image_ID'], $_SESSION['user_id']);
		if($check){
			$option = 1;
		}else $option = 0;
		
		$result = $model->insertRating($option, $_POST['image_ID'], $_SESSION['user_id'], $_POST['rateOption'], $_POST['uploader_userName']);
		
		header("Location: http://localhost/PHPSpartans/index.php");	
	}
}
	
if(isset($_POST["submit"]) && !empty($_POST["submit"])){
	processData();
}


