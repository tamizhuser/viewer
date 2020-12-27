<?php
 include 'connection.php';
 
$userID=$_POST["user_id"];
$cellarID=$_POST["marker_id"];

$sql ="SELECT user_name,user_location,user_profile_picture_path,user_rating,user_review FROM cellar WHERE user_id='".$userID."' AND marker_id='".$cellarID."' ";

$result = $conn->query($sql);

if($result->num_rows > 0){
	$rows=array();
	while($row=$result->fetch_assoc()){
		$rows[]=$row;
	}
	echo json_encode($rows);
	
}	
else{
	echo "0 results";
}	

$conn->close();

?>