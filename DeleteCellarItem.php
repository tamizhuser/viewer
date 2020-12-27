<?php
 include 'connection.php';
 
$UserID=$_POST["user_id"];
$MarkerID=$_POST["marker_id"];

$sql ="DELETE FROM cellar WHERE user_id='".$UserID."' AND marker_id='".$MarkerID."' ";

$result = $conn->query($sql);

if($conn->query($sql3) === TRUE)
{
	echo "Record deleted successfully";
	
}	
else
{
	echo "0 results";
}	

$conn->close();

?>
