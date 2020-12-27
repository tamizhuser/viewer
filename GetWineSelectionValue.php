<?php
include 'connection.php';
$TargetName=$_POST["targetName"];

$sql ="SELECT id,targetName,imageLocation,pairing,wines,winee,winev,grapeType,region,whatToExpect,description FROM objects WHERE targetName='".$TargetName."'";

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