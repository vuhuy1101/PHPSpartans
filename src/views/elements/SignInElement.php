<?php
namespace PHPSpartans\hw3\views\elements;

	/**
	* Reusable fragments of data. Specifcally for the Sign-In/Sign-Up link.
	*
	*/
class SignInElement extends Element {
	
	function render($data){
		?><li><a href="../PHPSpartans/index.php?controller=signUpForm">Sign-In/Sign-Up</a></li><?php
	}
	
}