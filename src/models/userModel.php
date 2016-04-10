<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

class userModel extends Model
{
	//user, password, email, firstname, lastname, created_time
	public function insertData($user, $password, $email, $fname, $lname, $created_time){
		$sql = "INSERT INTO Users(user,password,email,firstname,lastname,created_time) VALUES ('$user', '$password','email','firstname','lastname',CURRENT_TIMESTAMP)";
		$result = mysqli_query($this->conn, $sql);
	}

}
?>