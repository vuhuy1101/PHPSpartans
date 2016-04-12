<?php
namespace PHPSpartans\hw3\views\helpers;

class PopularHelper extends Helper
{
	function render($data)
	{
		$rate = null;
		$uploader = null;
		
		echo '<ul id="displayImg">';
		while($row = mysqli_fetch_assoc($data[4])){
			$image_ID = $row['imageID'];
			$data[3]->data_seek(0);
			while(($rateRow = mysqli_fetch_assoc($data[3]))){
				if($rateRow['imageID'] === $row['imageID'])
					$uploader = $rateRow['uploader_userName'];
			}
			
			echo 
				"<li><p><img src='src/resources/".$row['name'].".jpg' width='500' /></p>".
			     "<p>Caption: ".$row['caption']."</p>".
				 "<p>User: ".$uploader."</p>";
			
			mysqli_data_seek($data[2],0);
			while(($rateRow = mysqli_fetch_assoc($data[2]))){
				if($rateRow['imageID'] === $row['imageID'])
					$rate = $rateRow['rate'];
			}
			if($rate !== null)
			     echo "<p>Overall Rating: ".$rate."</p>";
			else
				echo "<p>Overall Rating: Not Rated Yet</p>"; 
			
			$d = strtotime($row['uploaded_time']);
			    echo "date: ".date("m-d-Y",$d)."</li>";
		}
		echo '</ul>';
	}
}
?>