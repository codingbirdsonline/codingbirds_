<?php
    $connection = new mysqli("localhost","root","","codingbirds");
    if (!$connection) {
        die("Error in database connection". $connection->connect_error);
    }
?>
