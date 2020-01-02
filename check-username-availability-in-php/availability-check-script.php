<?php
include "config.php";
if (isset($_POST['key']) == "usernameCheck") {
    $username = $_POST['username'];
    $query = "SELECT * FROM bird_check_usernames WHERE username='$username'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        echo "test^notAvailable";
    }else{
        echo "test^available";
    }

}
