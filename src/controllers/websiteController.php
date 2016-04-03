<?php
	namespace PHPSpartans\hw3\controllers;
	
	require_once("Controller.php");
	
	class websiteController extends Controller
	{
		function processRequest()
		{
			$data = [];
			
			$this->view("website")->render($data);
		}
	}
?>