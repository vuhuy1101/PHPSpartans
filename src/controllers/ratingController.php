<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\image_userModel;

require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/image_userModel.php');	
require_once(dirname(__DIR__).'/configs/DB_Config.php');
require_once("Controller.php");
	
function processData()
{
	$model = new image_userModel();
	if($model->connectDB()){
		$check = $model->retrieveRating($_POST['image_ID'], $_POST['user_ID']);
		if($check == null){
			$option = 1; //update
		}else $option = 0; //insert
		
		echo $option.'@'.$_POST['image_ID'].'/'.$_POST['user_ID'].'-'.$_POST['rateOption'].' end';
		$result = $model->insertRating($option, $_POST['image_ID'], $_POST['user_ID'], $_POST['rateOption'], $_POST['uploader']);
		
		header("Location: http://localhost/PHPSpartans/index.php");	
	}
}
	
if(isset($_POST["submit"]) && !empty($_POST["submit"])){
	processData();
}


