<?php
include  "config.php";
include_once  "Common.php";

if($_FILES['excelDoc']['name']) {
    $arrFileName = explode('.', $_FILES['excelDoc']['name']);
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['excelDoc']['tmp_name'], "r");
        $count = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {
                continue; // skip the heading header of sheet
            }
                $name = $connection->real_escape_string($data[0]);
                $mobile = $connection->real_escape_string($data[1]);
                $email = $connection->real_escape_string($data[2]);
                $common = new Common();
                $SheetUpload = $common->uploadData($connection,$name,$mobile,$email);
        }
        if ($SheetUpload){
            echo "<script>alert('Excel file has been uploaded successfully !');window.location.href='index.php';</script>";
        }
    }
}
