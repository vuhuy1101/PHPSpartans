<?php
namespace PHPSpartans\hw3\controllers;

require_once("Controller.php");

class signUpController extends Controller
{
	/**
	 * Used to handle form data coming from signUpController.
	 * Should sanitize/validate that data.
	 */
	function processRequest()
	{
		$data = $_GET;
		$data['PREVIOUS_USER_NAME'] = $this->sanitize("user_name","user_name");
		$data['PREVIOUS_USER_NAME_VALID'] = $this->validate($data['PREVIOUS_USER_NAME'],"user_name");
		
		$data['PREVIOUS_PASSWORD'] = $this->sanitize("password","password");
		$data['PREVIOUS_PASSWORD_VALID'] = $this->validate($data['PREVIOUS_PASSWORD'],"password");
		
		$data['PREVIOUS_FNAME'] = $this->sanitize("fname","fname");
		$data['PREVIOUS_FNAME_VALID'] = $this->validate($data['PREVIOUS_FNAME'],"fname");
		
		$data['PREVIOUS_LNAME'] = $this->sanitize("lname","lname");
		$data['PREVIOUS_LNAME_VALID'] = $this->validate($data['PREVIOUS_LNAME'],"lname");
		
		$data['PREVIOUS_EMAIL'] = $this->sanitize("email","email");
		$data['PREVIOUS_EMAIL_VALID'] = $this->validate($data['PREVIOUS_EMAIL'],"email");
		
		$this->view("signUp")->render($data);
	}
}	
?>