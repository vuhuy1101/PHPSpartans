<?php
namespace PHPSpartans\hw3\views\elements;

class SignInElement extends Element {
	
	function render($data){
		?><li><a href="../PHPSpartans/index.php?controller=signUpForm">Sign-In/Sign-Up</a></li><?php
	}
	
}