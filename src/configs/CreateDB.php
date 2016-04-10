<?php
//Create the Database for the project
require_once("Config.php");

$server = "localhost";
$user = "root";
$password = "";
		

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

//Connect to databasew
$conn = mysqli_connect($server, $user, $password, $db);
if(!$conn){
	echo "Could not connect to database";
}else{
	echo "Connect to database.\n";
}

$img_table = "ImageRating";
$user_table = "Users";
$img_sql = "CREATE TABLE $img_table(
id INT(10) PRIMARY KEY,
user VARCHAR(30),
caption VARCHAR(50),
rating INT(1),
uploaded_time TIMESTAMP)";

$user_sql = "CREATE TABLE $user_table(
id INT(5) PRIMARY KEY,
user VARCHAR(30),
password VARCHAR(15),
email VARCHAR(100),
firstname VARCHAR(20),
lastname VARCHAR(20),
created_time TIMESTAMP
)";

//Create table
mysqli_query($conn,"DROP TABLE IF EXISTS $img_table");
mysqli_query($conn, $img_sql);
mysqli_query($conn,"DROP TABLE IF EXISTS $user_table");
mysqli_query($conn, $user_sql);
mysqli_query($conn,  "INSERT INTO $user_table(id, user, password, email, firstname, lastname, created_time) VALUES ('0', 'kgb', '1234', 'david@gmail.com', 'David', 'Nakonechnyy', 'NULL')");
?>