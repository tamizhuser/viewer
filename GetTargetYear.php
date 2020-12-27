<?php
include 'connection.php';
$TargetName=$_POST["targetName"];

$sql ="SELECT id,Years,pairing,grapeType,region FROM objects WHERE targetName='".$TargetName."'";

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