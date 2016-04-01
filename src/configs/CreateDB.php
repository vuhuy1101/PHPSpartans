<?php
//Create the Database for the project
require_once("Config.php");

$conn = mysqli_connect($server, $user, $password, $db);
if(!$conn){
	echo "Could not connect to database";
}else{
	echo "Connect to database.\n";
}



$table = "ImageRating";
$sql = "CREATE TABLE $table(
id INT(10) PRIMARY KEY,
user VARCHAR(30),
caption VARCHAR(50),
rating INT(1),
uploaded_time TIMESTAMP)";

mysqli_query($conn,"DROP TABLE IF EXISTS $table");
mysqli_query($conn, $sql);

?>