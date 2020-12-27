<?php
include 'connection.php';
$markerID=$_POST["marker_id"];
$cellarItemYear=$_POST["cellar_item_year"];

$sql ="SELECT user_id FROM cellar WHERE marker_id='".$markerID."' AND cellar_item_year='".$cellarItemYear."'";

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