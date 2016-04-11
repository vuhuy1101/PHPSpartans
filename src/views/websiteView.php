<?php
namespace PHPSpartans\hw3\views;
use PHPSpartans\hw3\views\helpers\imageHelper;
	
require_once("View.php");
require_once("helpers/Helper.php");
require_once("helpers/imageHelper.php");
	
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
		$imgHelper = new ImageHelper();
					
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
				<title>Image Rating Website</title>
				<link rel="stylesheet" type="text/css" href="src/styles/website-styles.css">
			</head>
			<body>
				<h1>Image Rating <img src="../PHPSpartans/src/resources/Spartanlogo.jpg" alt="spartan_helmet" height="50" width="50"></h1>
				<?php
				if($_SESSION['login'] === "0"){ 
				?>
					<ul id="navbar">
						<li><a href="../PHPSpartans/index.php?controller=signUpForm">Sign-In/Sign-Up</a></li>
					</ul>
				<?php 
				} else {
				?>
					<ul id="navbar">
					    <li><a href = "logout.php" tite = "Logout"> Log out</a></li>
						<li>Welcome <?php echo $_SESSION['user'] ?></li>
					</ul>
			    <?php }
				if($_SESSION['login'] === "1"){
				?>
				<div id="uploadBttn">
					<button><a href="../PHPSpartans/index.php?controller=uploadForm">Upload Image</a></button>
				</div>
				<?php } ?>
				<div class="recentUpload">
					<h2>Recent 3 uploaded images</h2>
					<?php $imgHelper->render($data); ?>
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


