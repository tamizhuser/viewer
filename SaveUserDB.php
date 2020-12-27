<?php
if (isset($_FILES['myimage'])){

    $img = $_FILES['myimage']['name'];
    $tmpimg = $_FILES['myimage']['tmp_name'];

    //To get file extension
    //$fileExt = pathinfo($img, PATHINFO_EXTENSION) ;

    move_uploaded_file($tmpimg, "./user_db/$img");

    echo "[success] image ($img) uploaded successfully.";
    exit();
}
else{
	echo "[error] there is no data with name [myimage]";
}
?>
