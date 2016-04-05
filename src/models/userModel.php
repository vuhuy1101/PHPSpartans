<?php
namespace PHPSpartans\hw3\models;
require_once("Model.php");
require_once("../src/configs/Config.php");
	
class userModel extends Model
{
	function connectDB(){
		$conn = mysqli_connect($server, $user, $password);
		if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error."\n");
			return false;
		}
		else {
			return true;
		}
	}
	
}	
?>