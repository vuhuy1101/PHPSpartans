<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\imageModel;
use PHPSpartans\hw3\models\image_userModel;

require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/imageModel.php');
require_once(dirname(__DIR__).'/models/image_userModel.php');	
require_once("Controller.php");
	
class websiteController extends Controller
{
	/**
	 * Used to handle form data coming from websiteView.
	 * Should sanitize that data.
	 */
	function processRequest()
	{
		$imgModel = new imageModel();
		$img_userModel = new image_userModel();
		
		$checkDB = $imgModel->connectDB();
		if($checkDB === true){
			$temp = $imgModel->retrieveMostRecent();
		}
		
		if($img_userModel->connectDB()){
			$img_userAvg = $img_userModel->retrieveAVG();
			$img_userData = $img_userModel->retrieveData();
		}
		
		$data = array($temp, $_SESSION['user_id'], $img_userAvg, $img_userData);
		
		$this->view("website")->render($data);
	}
}	
?>