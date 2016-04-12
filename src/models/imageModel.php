<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

class imageModel extends Model
{

	public function insertData($name, $caption){
		$sql = "INSERT INTO ImageRating(name,caption,uploaded_time) VALUES ('$name', '$caption',CURRENT_TIMESTAMP)";
		$result = mysqli_query($this->conn, $sql);
	}
	
	public function retrieveMostRecent()
	{
		$sql = "SELECT * FROM phpspartans.ImageRating GROUP BY uploaded_time DESC LIMIT 3";
		$result = mysqli_query($this->conn, $sql);
		
		return $result;	
	}
	
	public function retrieveData()
	{
		$sql = "SELECT * FROM phpspartans.ImageRating";
		$result = mysqli_query($this->conn, $sql);
		
		return $result;	
	}
	
	public function retrieveID($name){
		$sql = "SELECT id FROM phpspartans.ImageRating WHERE name = '$name'";
		$result = mysqli_query($this->conn, $sql);
		$id = mysqli_fetch_array($result);
		
		return $id['id'];
	}
	
}
?>