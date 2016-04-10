<?php
//Model
namespace PHPSpartans\hw3\models;
use PHPSpartans\hw3\DB_Config;

require_once(dirname(__DIR__).'/configs/DB_Config.php');

abstract class Model
{
	var $data;
	var $conn;
	
	function connectDB(){
		$this->conn = mysqli_connect(DB_server, DB_user, DB_password, DB_db);
		if(mysqli_connect_errno()){
			die("Connection failed: ".mysqli_connect_error()."\n");
			return false;
		}
		else {
			return true;
		}
	}
	
	public function closeDB(){
		mysqli_close($this->conn);
	}
}

?>