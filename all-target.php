<?php
// Created by A. Wahab
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '') || $_SERVER["REQUEST_METHOD"] == "GET" ) {
    header ("Location:index.php");
}
else{
    include 'connection.php';
    $result = mysqli_query($conn,"SELECT id, vuforiaId, targetName, imageLocation, pairing, wines, winee, winev FROM objects"); 
    $rows = $result -> fetch_all(MYSQLI_ASSOC);
    $response['body']=json_encode($rows);
    http_response_code(200);
    echo json_encode($rows);
    // $response['status_code_header'];
    // return $response;
}
?>