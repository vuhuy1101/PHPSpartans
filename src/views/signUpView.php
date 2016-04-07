<?php

namespace PHPSpartans\hw3\views;

require_once("View.php");
	
/**
 * This class is responsible for drawing the complete page 
 */
class signUpView extends View
{
   /** 
	* Method used to draw the whole webpage
	* @param array $data data from the controller based on previously submitted
	*/	
	public function render($data)
	{
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
				<title>Sign-In/Sign-Up</title>
				<link rel="stylesheet" type="text/css" href="src\\styles\\website-styles.css">
			</head>
			<body>
				<h1 class="signIn"> Sign-In </h1>	
				<h1 class="signUp"> Sign-Up </h1>
				<div class="containerSignIn">
					<form>
						<label for="user_name">User Name:</label>
						<input type="text" id="user_name" name="user_name"/><br>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password"/><br>
						<input type="submit" value="Login"/>
					</form>
				</div>
				<div class="containerSignUp">
					<form>
						<label for="fname">First Name:</label>
						<input type="text" id="fname" name="fname"/><br>
						<label for="lname">Last Name:</label>
						<input type="text" id="lname" name="lname"/><br>
						<label for="user_name">User Name:</label>
						<input type="text" id="user_name" name="user_name"/><br>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password"/><br>
						<label for="e-mail">E-mail Address:</label>
						<input type="text" id="e-mail" name="e-mail"/><br>
						<input type="submit" value="Sign-Up"/>
					</form>
				</div>
			</body>
		</html>
		<?php
	}
}
?>