<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

class imageModel extends Model
{
	public function insertData($user, $caption, $rating){
		$sql = "INSERT INTO ImageRating(user,caption,uploaded_time) VALUES ('$user', '$caption',CURRENT_TIMESTAMP)";
		$result = mysqli_query($this->conn, $sql);
	}

}
?>