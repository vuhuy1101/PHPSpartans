<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

session_set_cookie_params(0);
session_start();

	/**
	*All methods that will be called by the user model by the controllers. 
	*
	*/
class userModel extends Model
{
	/**
	* Creates a new user in the userModel.
	*
	*/
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
			$findID = mysqli_query($this->conn, "SELECT * FROM Users WHERE user = '$userName' AND password ='$password'");
			if($row = mysqli_fetch_array($findID))
				$_SESSION['user_id'] = $row['id'];
			
			header("Location: http://localhost/PHPSpartans/index.php");
		} 
	}
	
	/**
	* Checks to see if the user can sign up for a new account or if it is taken.
	*
	*/
	function SignUp() { 
		if(!empty($_POST['user_name'])) //Check if the user name is empty
		{
			$result = mysqli_query($this->conn, "SELECT * FROM Users WHERE user = '$_POST[user_name]'") or die(mysql_error());
			if(!$row = mysqli_fetch_array($result)) { 
				$this->NewUser(); 
			} 
			else { 
				//Account is taken
				$_SESSION["taken"] = true;
				header("Location: http://localhost/PHPSpartans/index.php?controller=signUpForm");				
			}
		}
	}
	
	/**
	* Check to see if the user exists.
	*
	*/
	function checkUser(){
		if(!empty($_GET['user_name']) && !empty($_GET['password'])) //Check if the user name is empty
		{
			$userName = $_GET['user_name'];
			$password = $_GET['password']; 
			
			$result = mysqli_query($this->conn, "SELECT * FROM Users WHERE user = '$userName' AND password = '$password'") or die(mysql_error());
			
			if($row = mysqli_fetch_array($result)){ 
				//Account exists
				$_SESSION['login'] = "1";
				$_SESSION['user'] = $userName;
				$_SESSION['user_id'] = $row['id'];
				
				header("Location: http://localhost/PHPSpartans/index.php");	
			} 
			else { 
				//Account doesn't exist
				$_SESSION["noAccount"] = true;
				header("Location: http://localhost/PHPSpartans/index.php?controller=signUpForm");				
			}
		}	
	}
	
	/**
	* Retrieves all the data from the user model.
	*
	*/
	function retrieveData(){
		$sql = "SELECT * FROM phpspartans.Users";
		$result = mysqli_query($this->conn, $sql);
		
		return $result;

	}

}
?>