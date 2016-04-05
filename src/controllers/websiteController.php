<?php
	namespace PHPSpartans\hw3\controllers;
	
	require_once("Controller.php");
	
	class websiteController extends Controller
	{
		function processRequest($name)
		{
			$data = [];
			
			$this->view($name)->render($data);
		}
	}	
?>