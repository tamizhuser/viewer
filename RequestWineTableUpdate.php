
<?php
include 'connection.php';

$UserID=$_POST["id"];
$ImageLocation=$_POST["imageLocation"];
$UserName=$_POST["user_name"];
$sql2 = "INSERT INTO request_target (id,imageLocation,user_name) VALUES ('".$UserID."','".$ImageLocation."', '".$UserName."')";

if ($conn->query($sql2) === TRUE) 
{
	echo "New record created successfully";
		
} 
else 
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>