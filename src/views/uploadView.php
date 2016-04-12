<?php
namespace PHPSpartans\hw3\views;

require_once("View.php");

class uploadView extends View
{
	function render($data){
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Image Upload Form</title>
			<link rel="stylesheet" type="text/css" href="src/styles/website-styles.css">
		</head>
		<body>

		<h2> Upload Form</h2>
		<form id="uploadForm" action="../PHPSpartans/src/controllers/uploadController.php" method="post" enctype="multipart/form-data" autocomplete="off">
			<p><label for="imgName">Image Name</label></p>
			<p><input type="text" name="imgName" id="imgName"/></p>
			<p><label for="">Caption</label></p>
			<p><input type="text" name="caption" id="caption"/></p>
			<p><label for="uploadFile">Select Image (JPEG only):</label></p>
			<p><input type="file" name="uploadFile" id="uploadFile"/></p>
			<input type="submit" value="Upload Image" name="submit"/>

		</form>

		</body>	
		</html>
		<?php
	}
}

?>