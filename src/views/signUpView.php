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
					<form action="../PHPSpartans/src/controllers/signUpController.php" method="get" autocomplete="off">
						<label for="user_name">User Name:</label>
						<input type="text" id="user_name" name="user_name" maxlength="12"/><br>
						<label for="password">Password:</label>
						<input type="password" id="password" maxlength="12" name="password"/><br>
						<input type="submit" name="signIn" value="Login"/>
					</form>
				<?php 
				if(isset($_SESSION["noAccount"])){
					if($_SESSION["noAccount"] === true){
				?> <p> This account doesn't exist. Please try again. </p>
				<?php unset($_SESSION["noAccount"]); }}?>
				</div>
				<div class="containerSignUp">
					<form action="../PHPSpartans/src/controllers/signUpController.php" method="post" autocomplete="off">
						<label for="fname">First Name:</label>
						<input type="text" id="fname" name="fname" maxlength="20"/><br>
						<label for="lname">Last Name:</label>
						<input type="text" id="lname" name="lname" maxlength="20"/><br>
						<label for="user_name">User Name:</label>
						<input type="text" id="user_name" name="user_name" maxlength="12"/><br>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" maxlength="12"/><br>
						<label for="e-mail">E-mail Address:</label>
						<input type="text" id="email" name="email" maxlength="20"/><br>
						<input type="submit" name="submit" value="SignUp"/>
					</form>
					<?php 
					if(isset($_SESSION["taken"])){
						if($_SESSION["taken"] === true){
					?> <p> The account is taken. Please try again. </p>
					<?php unset($_SESSION["taken"]); }}?>
				</div>
		
			</body>
		</html>
		<?php
	}
}
?>