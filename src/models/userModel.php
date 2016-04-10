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
	
	public function NewUser() { 
		$fname = $_POST['fname'];
		$lname = $_POST['lname']; 	
		$userName = $_POST['user_name'];
		$password = $_POST['password']; 	
		$email = $_POST['email'];  
		$query = "INSERT INTO User(id, user, password, email, firstname, lastname, created_time) VALUES ('0','$fname','$lname', '$userName', '$password', 'email')"; 
		$data = mysql_query ($query)or die(mysql_error()); 
		if($data) { 
			echo "Your registration is completed!"; } 
	}
	
	function SignUp() { 
		if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
		{
			$query = mysql_query("SELECT * FROM User WHERE user = '$_POST[user_name]' AND pass = '$_POST[password]'") or die(mysql_error()); 
			
			if(!$row = mysql_fetch_array($query) or die(mysql_error())) { 
				NewUser(); 
			} 
			else { 
				echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
			}
		}
		else{
			echo "Not working";
		}
	}

	function submit()
	{
		if(isset($_POST['submit'])) 
		{ 
			echo "Submitting";
			SignUp(); 
		}
		else{
			echo "submit not working";
		}
		
		echo "I made it....";
	}

}
?>