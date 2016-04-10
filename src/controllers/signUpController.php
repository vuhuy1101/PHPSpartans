<?php
	namespace PHPSpartans\hw3\controllers;
	
	require_once("Controller.php");
	
	class signUpController extends Controller
	{
		/**
		 * Used to handle form data coming from websiteView.
		 * Should sanitize that data.
		 */
		function processRequest()
		{
			$data = [];
			
			$this->view("signUp")->render($data);
		}
	}	
?>