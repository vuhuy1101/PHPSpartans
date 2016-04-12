<?php
namespace PHPSpartans\hw3\controllers;
use PHPSpartans\hw3\models\imageModel;
use PHPSpartans\hw3\models\image_userModel;
	
require_once(dirname(__DIR__).'/models/Model.php');
require_once(dirname(__DIR__).'/models/imageModel.php');
require_once(dirname(__DIR__).'/models/userModel.php');
require_once(dirname(__DIR__).'/models/image_userModel.php');
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
			if(isset($_POST['imgName'])){
				$imgName = $_POST["imgName"];
			}
			if(imagejpeg($scaled_image,dirname(dirname(__DIR__))."/src/resources/".$imgName.".jpg")){
				if(isset($_POST['caption']))
					$caption = $_POST["caption"];
					
				$userName = $_SESSION['user'];
				$img_userModel = new image_userModel();
				$imgModel = new imageModel();
				$checkDB = $imgModel->connectDB();
				if($checkDB == true){
					$imgModel->insertData($imgName, $caption);
				}
				
				if($img_userModel->connectDB()){
					$img_ID = $imgModel->retrieveID($imgName);
					$img_userModel->insertUploader($img_ID, $_SESSION['user_id'], $userName);
				}
				
				$imgModel->closeDB();
				
				echo "<p>Picture was uploaded successfully!</p>
					  <button><a href='http://localhost/PHPSpartans/index.php?controller=uploadForm'>Upload Another Image.</a></button><br><br>
					  <button><a href='http://localhost/PHPSpartans/'>To The Main Page.</a>";
				
			}

		}
		else {
			$valid = 0;
			echo "<p>Picture failed.</p>
					  <button><a href='http://localhost/PHPSpartans/index.php?controller=uploadForm'>Upload Another Image.</a></button><br><br>
					  <button><a href='http://localhost/PHPSpartans/'>To The Main Page.</a>";
		}
	}
}

if(isset($_POST["submit"]) && !empty($_POST["submit"])){
	processData();
}

?>