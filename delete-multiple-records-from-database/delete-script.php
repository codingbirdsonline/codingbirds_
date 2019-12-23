<?php
include "config.php";
include_once "Common.php";
if (isset($_POST['deleteBtn'])){
    $recordIds = $_POST['recordsCheckBox'];
    $common = new Common();
    foreach ( $recordIds as $id ) {
        $delete = $common->deleteRecordById($connection,$id);
    }
    if ($delete) {
        echo '<script>alert("Record deleted successfully !")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
}
