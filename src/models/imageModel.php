<?php
namespace PHPSpartans\hw3\models;

require_once("Model.php");
require_once(dirname(__DIR__).'/configs/DB_Config.php');

class imageModel extends Model
{
	public function insertData($name, $caption, $rating){
		$sql = "INSERT INTO ImageRating(name,caption,uploaded_time) VALUES ('$name', '$caption',CURRENT_TIMESTAMP)";
		$result = mysqli_query($this->conn, $sql);
	}

}
?>