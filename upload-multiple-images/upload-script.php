<?php
include "config.php";

if (isset($_POST['uploadImageBtn'])) {
    $uploadFolder = 'uploads/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO bird_multiple_images  (imgName) VALUES ('$imageName')" ;
        $run = $connection->query($query) or die("Error in saving image".$connection->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
}

