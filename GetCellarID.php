<?php
include 'connection.php';
$userID=$_POST["user_id"];

$sql ="SELECT marker_id,cellar_item_year FROM cellar WHERE user_id='".$userID."'";

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