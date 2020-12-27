<?php
include 'connection.php';
$userName=$_POST["user_name"];
$emailID=$_POST["email_id"];
$passWord=$_POST["password"];
$Since=$_POST["since"];
$loginWith=$_POST["login_with"];


$sql ="SELECT user_name FROM users WHERE email_id='".$emailID."'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	$rows=array();
	while($row=$result->fetch_assoc())
	{
		
		$rows[]=$row;
		
	}
	echo "Already Register";
	
}	
else
{
	
	$sql2 = "INSERT INTO users (user_name, email_id, password,since,login_with)	VALUES ('".$userName."', '".$emailID."', '".$passWord."', '".$Since."', '".$loginWith."')";

	if ($conn->query($sql2) === TRUE) 
	{
		//echo "New record created successfully";
		$sql3 ="SELECT id FROM users WHERE email_id='".$emailID."'";

		$result3 = $conn->query($sql3);

		if($result3->num_rows > 0)
		{
			$rows3=array();
			while($row=$result3->fetch_assoc()){
				
				$rows3[]=$row;
				
			}
			echo json_encode($rows3);
			
		}
	} 
	else 
	{
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}	

$conn->close();

?>