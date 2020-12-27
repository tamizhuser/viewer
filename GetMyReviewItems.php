<?php
 include 'connection.php';
 
$cellarID=$_POST["id"];

$sql ="SELECT imageLocation,targetName FROM objects WHERE id='".$cellarID."'";

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
