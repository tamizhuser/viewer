<?php
include 'connection.php';

$uniqueID=$_POST["unique_id"];
$userName=$_POST["user_name"];
$emailID=$_POST["email_id"];
$ProfilePicturePath=$_POST["profile_picture_path"];
$Since=$_POST["since"];
$loginWith=$_POST["login_with"];
$Location=$_POST["location"];

$sql ="SELECT id FROM users WHERE unique_id='".$uniqueID."'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	
	$sql3 = "UPDATE users SET user_name='".$userName."',email_id='".$emailID."',profile_picture_path='".$ProfilePicturePath."' WHERE unique_id='".$uniqueID."'";

		
		if ($conn->query($sql3) === TRUE) 
		{
			$last_id = $conn->insert_id;
			
			$sql3 ="SELECT id,since,location,profile_picture_path FROM users WHERE unique_id='".$uniqueID."'";
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
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	
	
	
	
}	
else
{
	$sql2 = "INSERT INTO users (unique_id,user_name, email_id, profile_picture_path,since,login_with,location)	VALUES ('".$uniqueID."','".$userName."', '".$emailID."', '".$ProfilePicturePath."', '".$Since."','".$loginWith."', '".$Location."')";

	if ($conn->query($sql2) === TRUE) 
	{
		//echo "New record created successfully";
		$sql3 ="SELECT id,since,location,profile_picture_path FROM users WHERE unique_id='".$uniqueID."'";

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
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}	

$conn->close();

?>