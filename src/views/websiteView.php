<?php
namespace PHPSpartans\hw3\views;
	
require_once("View.php");
	
/**
 * This class is responsible for drawing the complete page 
 */
class websiteView extends View
{
   /** 
	* Method used to draw the whole webpage
	* @param array $data data from the controller based on previously submitted
	*/	
	public function render($data)
	{
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
				<title>Image Rating Website</title>
				<link rel="stylesheet" type="text/css" href="src\\styles\\website-styles.css">
			</head>
			<body>
				<h1>Image Rating[logo here]</h1>
				<ul id="navbar">
					<li><a href="../PHPSpartans/index.php?c=signUp">Sign-In/Sign-Up</a></li>
				</ul>
				<div id="uploadBttn">
					<button><a href="../PHPSpartans/index.php?c=uploadForm">Upload Image</a></button>
				</div>
				<div class="recentUpload">
					<h2>Recent 3 uploaded images</h2>
					<img src="src/resources/1.jpg" />
				</div>
				<div class="popularUpload">
					<h2>Most popular images</h2>
				</div>
			</body>
		</html>
		<?php
	}
}
?>


