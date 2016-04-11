<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\imageModel;

require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/imageModel.php');	
require_once("Controller.php");
	
class websiteController extends Controller
{
	/**
	 * Used to handle form data coming from websiteView.
	 * Should sanitize that data.
	 */
	function processRequest()
	{
		$data = [];
		$imgModel = new imageModel();
		$checkDB = $imgModel->connectDB();
		if($checkDB === true){
			$data = $imgModel->retrieveMostRecent();
		}
		
		$this->view("website")->render($data);
	}
}	
?>