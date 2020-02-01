<?php
$connection = new mysqli("localhost","root","","codingbirds");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
