<?php
include "config.php";
include_once "Common.php";
/**
 * Create the class object,where we defined our functions
 */
$common = new Common();
/**
 * API to get all the records
 */
if (isset($_POST['apiName']) && $_POST['apiName'] == 'getData') {
    $response = array();
    $records = $common->getAllRecords($connection);
    if ($records->num_rows > 0) {
        while ($row = $records->fetch_object()) {
            $items[] = $row;
        }
        $response['status'] = 1;
        $response['data'] = $items;
    } else {
        $response['status'] = 0;
    }
    echo json_encode($response);
}

/**
 * Api to delete the records
 */
if (isset($_POST['apiName']) && $_POST['apiName'] == 'deleteData'){
    $id = $_POST['id'];
    $response = array();
    $delete = $common->deleteRecord($connection,$id);
    if ($delete){
        $response['status'] = 1;
        $response['message'] = "Record deleted successfully!";
    }else{
        $response['status'] = 0;
        $response['message'] = "Some error";
    }
    echo json_encode($response);
}
