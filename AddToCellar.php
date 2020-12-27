<?php
include 'connection.php';

$userID=$_POST["user_id"];
$currentTargetName=$_POST["targetName"];
$cellarItemYear=$_POST["cellar_item_year"];

$sql ="SELECT id FROM objects WHERE targetName='".$currentTargetName."'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	$rows=array();
	while($row=$result->fetch_assoc())
	{
		$rows[]=$row;
		//MarkerName
		$MID =$row["id"];
		echo $MID;
		$sql2 ="SELECT marker_id FROM cellar WHERE user_id='".$userID."'AND cellar_item_year='".$cellarItemYear."'";

        $result2 = $conn->query($sql2);
		
		$currentCount = 0;
		
		if($result2->num_rows > 0)// Check Previous Saved
		{
			$rows2=array();
			while($row=$result2->fetch_assoc())
			{
				$rows2[]=$row;
				$MID2 =$row["marker_id"];
				echo $MID2;
				if($MID==$MID2)
				{
					$currentCount =$currentCount+ 1;
				}
				
			}			
			if($currentCount==0) //New
			{
				echo "GGG";
				$sql3 = "INSERT INTO cellar (user_id,marker_id,cellar_item_year) VALUES ('".$userID."', '".$MID."','".$cellarItemYear."')";
		
				if ($conn->query($sql3) === TRUE) 
				{
					$last_id = $conn->insert_id;
					echo "New record created successfully. Last inserted ID is: " . $last_id;
				}
				else 
				{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			
		}
		else//Ad to DB
		{
			$sql4 = "INSERT INTO cellar (user_id,marker_id,cellar_item_year) VALUES ('".$userID."', '".$MID."','".$cellarItemYear."')";
	
			if ($conn->query($sql4) === TRUE) 
			{
				$last_id = $conn->insert_id;
				echo "New record created successfully. Last inserted ID is: " . $last_id;
			}
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}	
	}	
}	
else
{
	echo "0 results";	
	
	
	
}
	
	

$conn->close();

?>