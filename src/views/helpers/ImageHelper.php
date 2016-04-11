<?php
namespace PHPSpartans\hw3\views\helpers;

class ImageHelper extends Helper
{
	function render($data)
	{
		$count = 0;
		echo '<ul id="displayImg">';
		//id, name, caption, rating, uploaded_time
		if(mysqli_num_rows($data) > 0){
			while(($row = mysqli_fetch_assoc($data)) && $count < 3){
				echo 
				     "<li><p>name: ".$row['name']."</p>".
				     "<p>caption: ".$row['caption']."</p>".
				     "<p><img src='src/resources/".$row['name'].".jpg' width='500' /></p>";
				if($row['rating'] !== null)
				     echo "<p>Rating: ".$row['rating']."</p>";
				else {
					if($_SESSION['login'] === "1"){
						echo 
							"<p>Rating: <select>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3' selected='selected'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
							</select>
							<button type='submit' value='Rate It'>Rate It</button></p>";
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
