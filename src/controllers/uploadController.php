<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\imageModel;
	
require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/imageModel.php');
require_once(dirname(__DIR__).'/configs/DB_Config.php');
require_once("Controller.php");

function processData()
{
	$destination = __DIR__."../resources/";
	$target_file = $destination.basename($_FILES["uploadFile"]["name"]);
	$tmp_name = $_FILES["uploadFile"]["tmp_name"];

	$valid = 1;
	$fileType = $_FILES["uploadFile"]["type"];
	// Check if image file is a actual image or fake image	
	if(isset($_POST["submit"])) {
		//check if the file is temporarily located on server
		if(getimagesize($tmp_name))
		{
			// Allow only jpeg formats
			if($fileType != "image/jpeg") {
				echo "Uploading Error. Only JPEG file is allowed. Please try again!";
				$valid = 0;
				break;
			}
			
			// If validated, then the image can be saved to resources folder and database
			$valid = 1;
			$exif = exif_read_data($tmp_name);

			// Get width and height of uploaded image
			list($width, $height) = getimagesize($tmp_name);
			$image_resource = imagecreatefromjpeg($tmp_name);
			// Scale image
			$scaled_image = imagescale($image_resource, 500, 500*$height/$width); 
			imagejpeg($scaled_image,"../resources/".$_FILES["uploadFile"]["name"]);
			if(isset($_POST['imgName'])){
				$imgName = $_POST["imgName"];
			}
			if(isset($_POST['caption']))
				$caption = $_POST["caption"];
			$rating = null;
			$imgModel = new imageModel();
			$checkDB = $imgModel->connectDB();
			if($checkDB == true){
				$imgModel->insertData($imgName, $caption, $rating);
				$imgModel->closeDB();
			}
			
			echo "Your image has been successfully uploaded!";
		}
		else {
			$valid = 0;
			echo "Failed";
		}
	}
}

if(isset($_POST["submit"]) && !empty($_POST["submit"])){
	processData();
}

?>