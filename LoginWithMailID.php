<?php
include 'connection.php';
$emailID=$_POST["unique_id"];
$emailID=$_POST["user_name"];
$passWord=$_POST["email_id"];
$emailID=$_POST["profile_picture_path"];
$passWord=$_POST["login_with"];


$sql ="SELECT id,user_name FROM users WHERE email_id='".$emailID."' AND password='".$passWord."'";

$result = $conn->query($sql);

if($result->num_rows > 0){
	$rows=array();
	while($row=$result->fetch_assoc()){
		
		$rows[]=$row;
		
	}
	echo json_encode($rows);
	
}	
else{
	echo "Not Registered";
}	

$conn->close();

?>