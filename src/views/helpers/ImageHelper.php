<?php
namespace PHPSpartans\hw3\views\helpers;

class ImageHelper extends Helper
{
	function render($data)
	{
		$count = 0;
		$rate = null;
		echo '<ul id="displayImg">';
		//id, name, caption, rating, uploaded_time
		if(mysqli_num_rows($data[0]) > 0){
			while(($row = mysqli_fetch_assoc($data[0])) && $count < 3){
				$image_ID = $row['id'];
				echo 
				     "<li><p>name: ".$row['name']."</p>".
				     "<p>caption: ".$row['caption']."</p>".
				     "<p><img src='src/resources/".$row['name'].".jpg' width='500' /></p>";
				if(mysqli_num_rows($data[2]) > 0){
					while($rateRow = mysqli_fetch_assoc($data[2])){
						if($rateRow['imageID'] === $row['id']){
							$rate = $rateRow['rate'];
							break;
						}
					}
				}
				
				if($rate !== null)
				     echo "<p>Overall Rating: ".$rate."</p>";
				else
					echo "<p>Overall Rating: Not Rated Yet</p>"; 
				
				if($_SESSION['login'] === "1"){
					$user_ID = $data[1];
					$count = 0;
					if(mysqli_num_rows($data[3]) > 0){
						while(($rateRow2 = mysqli_fetch_assoc($data[3])) && $count < 1){
						if($rateRow2['imageID'] === $image_ID && $rateRow2['userID'] === $user_ID){
							$yourRate = $rateRow2['rate'];
							echo "<p>Your Rate: $yourRate</p>";	
							$count = 1;
						}
						}
					}
					if($count == 0){
							echo 
								"
								<form action='../PHPSpartans/src/controllers/ratingController.php' method='post'>
								<input type='hidden' name='image_ID' value='$image_ID'>
								<input type='hidden' name='user_ID' value='$user_ID'>
								<p>Rating: <select name='rateOption' id='rateOption'>
									<option value='1'>1</option>
									<option value='2'>2</option>
									<option value='3' selected='selected'>3</option>
									<option value='4'>4</option>
									<option value='5'>5</option>
								</select>
								<button type='submit' name='submit' value='Rate It'>Rate It</button></p></form>";
						}
					
					
				}
				
					$d = strtotime($row['uploaded_time']);
				    echo "date: ".date("m-d-Y",$d)."</li>";
				$count++;
			}
			echo "</ul>";
		}
		
	}
}

?>
