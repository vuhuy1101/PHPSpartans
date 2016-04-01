<?php
//Constants for the project
$server = "localhost:3306";
$user = "root";
$password = "";
$db = "phpspartans";

$conn = mysqli_connect($server, $user, $password);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error."\n");
}

//Create database
$query = "CREATE DATABASE $db";
if($conn->query($query) === TRUE){
	echo "Database created successfully!\n";
}else{
	echo "Error creating database: ".$conn->error."\n";
}

?>