<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

class image_userModel extends Model
{
	public function insertRating($option, $imageID, $userID, $rate, $uploader){
		$sql1 = "UPDATE Images_Users SET rate = $rate WHERE imageID = $imageID AND userID = $userID AND uploader_userName = '$uploader'" ;
		$sql2 = "INSERT INTO Images_Users VALUES($imageID, $userID, $rate, '$uploader')";
		
		if($option == 1)
			$result = mysqli_query($this->conn, $sql1);
		else $result = mysqli_query($this->conn, $sql2);
		
		return $result;
	}
	
	public function insertUploader($imageID, $userID, $userName){
		$sql = "INSERT INTO Images_Users(imageID, userID, uploader_userName) VALUES ($imageID, $userID, '$userName')";
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
	
	public function retrievePopular()
	{
		$sql = "SELECT imageID, name, caption, uploaded_time, AVG(rate) as average FROM phpspartans.Images_Users, 
		phpspartans.ImageRating WHERE Images_Users.imageID = ImageRating.ID 
		GROUP BY imageID ORDER BY average DESC LIMIT 10";
		$result = mysqli_query($this->conn, $sql);
		
		return $result;
	}
	
	public function retrieveRating($imageID, $userID)
	{
		$sql = "SELECT rate FROM phpspartans.Images_Users WHERE imageID = $imageID AND userID = $userID AND uploader_userName is NOT NULL";
		$result = mysqli_query($this->conn, $sql);
		if(mysqli_num_rows($result) > 0)
			$rate = mysqli_fetch_array($result);
		else 
			return "not exists";
		
		return $rate['rate'];

	}
	
}
?>
