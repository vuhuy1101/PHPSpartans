<?php
	namespace PHPSpartans\hw3\controllers;
		
	require_once("Controller.php");
	
	/**
	*Processes the form data from the uploadForms and renders the proper view.
	*
	*/
	class UploadFormController extends Controller
	{
		/**
		 * Used to handle form data coming from websiteView.
		 * Should sanitize that data.
		 */
		function processRequest()
		{
			$data = [];
			
			$this->view("upload")->render($data);
		}
	}	
?>