<?php
include 'connection.php';
$sql = "select * from vuforiaKeys";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
        $accessKey = $row['accessKey'];
        $secretKey = $row['secretKey'];
    }
}
?>