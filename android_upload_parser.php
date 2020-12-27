<?php
$folder = 'AndroidAssets';
$fileName = $_FILES["file3"]["name"]; // The file name
$fileTmpLoc = $_FILES["file3"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file3"]["type"]; // The type of file it is
$fileSize = $_FILES["file3"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file3"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "$folder/$fileName")){
    echo "$fileName upload is complete";
} else {
    echo "move_uploaded_file function failed";
}
?>