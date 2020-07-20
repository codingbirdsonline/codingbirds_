<?php
$connection = new mysqli("localhost","root","","select2");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
