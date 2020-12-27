<?php
include 'connection.php';
$targetname = $_REQUEST['imageTarget'];
$sql = "UPDATE objects SET views = views + 1 WHERE targetName = '".$targetname."'";
if (mysqli_query($conn, $sql)) {
echo "ok";
}else{
echo "none";	
}
?>