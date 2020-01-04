<?php
include "config.php";
if (isset($_POST['key']) == "saveData")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $query = "INSERT INTO bird_ajax_register SET name='$name',email='$email',contact='$contact'";
    $result = $connection->query($query);
    if ($result) {
        echo "status^saved";
    }
}
