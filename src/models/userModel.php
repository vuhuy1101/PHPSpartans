<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

session_start();

class userModel extends Model
{
	var $userName = null;
	var $userID = null;
	
	function NewUser() { 
		$fname = $_POST['fname'];
		$lname = $_POST['lname']; 	
		$userName = $_POST['user_name'];
		$password = $_POST['password']; 	
		$email = $_POST['email'];  
		$timestamp = date('Y-m-d G:i:s');
		$sql = "INSERT INTO Users(id, user, password, email, firstname, lastname, created_time) VALUES ('0','$userName','$password', '$email', '$fname', '$lname', '$timestamp')";
		$data = mysqli_query($this->conn, $sql)or die(mysql_error()); 
		if($data) { 
			//Registration Done
			$_SESSION['login'] = "1";
			$_SESSION['user'] = $userName;
			
			header("Location: http://localhost/PHPSpartans/index.php");
		} 
	}
	
	function SignUp() { 
		if(!empty($_POST['user_name'])) //Check if the user name is empty
		{
			$result = mysqli_query($this->conn, "SELECT * FROM Users WHERE user = '$_POST[user_name]'") or die(mysql_error());
			if(!$row = mysqli_fetch_array($result)) { 
				$this->NewUser(); 
			} 
			else { 
				//Account is taken
				header("Location: http://localhost/PHPSpartans/index.php?controller=signUpForm");			
			}
		}
	}
	
	function checkUser(){
		if(!empty($_GET['user_name']) && !empty($_GET['password'])) //Check if the user name is empty
		{
			$userName = $_GET['user_name'];
			$password = $_GET['password']; 
			echo $userName;
			echo $password;
			
			$result = mysqli_query($this->conn, "SELECT * FROM phpspartans.Users WHERE user = '$userName' AND password = $password") or die(mysql_error());
			if($row = mysqli_fetch_array($result)) { 
				//Account exists
				$_SESSION['login'] = "1";
				$_SESSION['user'] = $userName;
				$_SESSION['user_id'] = $row['id'];
				header("Location: http://localhost/PHPSpartans/index.php");	
			} 
			else { 
				//Account doesn't exist
				header("Location: http://localhost/PHPSpartans/index.php?controller=signUpForm");				
			}
		}	
	}

}
?>