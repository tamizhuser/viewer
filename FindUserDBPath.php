
<?php
include 'connection.php';

$UniqueID=$_POST["unique_id"];
$ImageLocation=$_POST["profile_picture_path"];

$sql2 = "UPDATE users SET  profile_picture_path='".$ImageLocation."' WHERE unique_id='".$UniqueID."' ";

if ($conn->query($sql2) === TRUE) 
{
	    $sql3 ="SELECT id,since,location FROM users WHERE unique_id='".$UniqueID."'";

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
$conn->close();

?>