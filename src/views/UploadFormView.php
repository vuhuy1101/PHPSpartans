<?php
namespace PHPSpartans\hw3\views;

require_once("View.php");

class UploadFormView extends View
{
	function render($data){
		?>
		<!DOCTYPE html>
		<html>
		<body>

		<form action="../PHPSpartans/src/controllers/uploadController.php" method="post" enctype="multipart/form-data">
			<p><label for="imgName">Image Name</label>
			<input type="text" name="imgName" id="imgName"/></p>
			<p><label for="">Caption</label>
			<input type="text" name="caption" id="caption"/></p>
			<p><label for="uploadFile">Select Image (JPEG only):</label>
			<input type="file" name="uploadFile" id="uploadFile"/></p>
			<input type="submit" value="Upload Image" name="submit"/>
		</form>

		</body>	
		</html>
		<?php
	}
}

?>