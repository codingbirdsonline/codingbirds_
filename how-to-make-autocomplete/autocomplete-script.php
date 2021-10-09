<?php
include "config.php";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $response = array();
    $query = "SELECT * FROM bird_autocomplete WHERE username LIKE '%$search%' ";
    $result = $connection->query($query) or die("error in query" .$connection->error);
    if ($result->num_rows > 0) {
//        $data['success'] = true;
        while ($row = $result->fetch_object()){
            $data['id'] = $row->id;
            $data['username'] = $row->username;
            $response[] = $data;
        }
    }else{
        $response['success'] = false;
    }
    echo json_encode($response);

}
