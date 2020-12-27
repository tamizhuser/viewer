<?php
include 'connection.php';

$Location=$_POST["user_location"];
$userName=$_POST["user_name"];
$userID=$_POST["user_id"];
$markerID=$_POST["marker_id"];
$cellarItemYear=$_POST["cellar_item_year"];
$userRating=$_POST["user_rating"];
$userReview=$_POST["user_review"];
$ImgPath=$_POST["user_profile_picture_path"];

		$sql3 = "UPDATE cellar SET user_location='".$Location."',user_name='".$userName."',user_rating='".$userRating."',user_review='".$userReview."',user_profile_picture_path='".$ImgPath."' WHERE user_id='".$userID."' AND marker_id='".$markerID."' AND cellar_item_year='".$cellarItemYear."'";

		
		if ($conn->query($sql3) === TRUE) 
		{
			$last_id = $conn->insert_id;
			echo "New record created successfully. Last inserted ID is: " . $last_id;
		}
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		

$conn->close();

?>