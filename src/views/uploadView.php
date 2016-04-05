<?php
namespace PHPSpartans\hw3\views;

require_once("View.php");

class uploadView extends View
{
	function render($data){
		?>
		<!DOCTYPE html>
		<html>
		<body>

		<form action="../PHPSpartans/src/controllers/uploadController.php" method="post" enctype="multipart/form-data">
			Select your image (JPEG only): 
			<input type="file" name="uploadFile" id="uploadFile">
			<input type="submit" value="Start Upload" name="submit">
		</form>

		</body>	
		</html>
		<?php
	}
}

?>