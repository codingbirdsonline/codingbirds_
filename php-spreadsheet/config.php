<?php
$connection = new mysqli("localhost","root","","superhouse_production");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}

