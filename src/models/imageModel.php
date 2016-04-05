<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once("src/configs/Config.php");
	
class imageModel extends Model
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
	
	function getID(){
		
	}
	
	//arr(id, user, caption, rating, uploaded_time)
	function updateData($user, $caption, $rating, $uploaded_time){
		$sql = "INSERT INTO ImageRating VALUES ($user, $caption, $rating, $uploaded_time)";
		mysqli_query($conn, $sql);
	}
	
	function closeDB(){
		mysqli_close($conn);
	}
}	

?>