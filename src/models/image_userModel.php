<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

class image_userModel extends Model
{
	public function insertData($imageID, $userID, $rate){
		$sql = "INSERT INTO Images_Users VALUES ('$imageID', '$userID', '$rate')";
		$result = mysqli_query($this->conn, $sql);
		
		return $result;
	}
	
	public function retrieveAVG()
	{
		$sql = "SELECT imageID, ROUND(AVG(rate),1) as rate FROM phpspartans.Images_Users GROUP BY imageID";
		$result = mysqli_query($this->conn, $sql); 
		
		return $result;
	}
	
	public function retrieveData()
	{
		$sql = "SELECT * FROM phpspartans.Images_Users";
		$result = mysqli_query($this->conn, $sql);
		
		return $result;
	}
	
}
?>
