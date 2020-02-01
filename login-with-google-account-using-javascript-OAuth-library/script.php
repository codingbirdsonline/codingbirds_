<?php
include "config.php";

if ($_POST['authProvider'] == "Google"){
    $authProvider = $_POST['authProvider'];
    $googleTockenId = $_POST['googleTockenId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $profile = $_POST['profile'];
    $now = date('Y-m-d H:i:s');

    // Check whether the user data already exist in the database
    $queryCheck = "SELECT * FROM bird_google_auth WHERE authProvider = '$authProvider' AND googleIdTocken = '$googleTockenId'";
    $resultCheck = $connection->query($queryCheck);
    if ($resultCheck->num_rows>0){
        $queryPerform = "UPDATE bird_google_auth SET authProvider = '$authProvider',googleIdTocken = '$googleTockenId',name='$name',
        email='$email',profile='$profile',modified='$now' WHERE authProvider = '$authProvider' AND googleIdTocken = '$googleTockenId'";
    }else{
        $queryPerform = "INSERT INTO bird_google_auth SET authProvider = '$authProvider', googleIdTocken = '$googleTockenId',name='$name',
        email='$email',profile='$profile',created='$now',modified='$now' ";
    }

    $finalResultset = $connection->query($queryPerform) or die("Error in query".$connection->error);
    if($finalResultset){
        echo "test^loggedIn";
    }
}
