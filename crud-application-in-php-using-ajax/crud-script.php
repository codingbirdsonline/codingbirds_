<?php
include "config.php";
include_once "CrudOperations.php";
$crudObj = new CrudOperations();
if ($_POST['crudOperation'] == "saveData") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $editId = $_POST['editId'];
    $save = $crudObj->saveData($connection,$name,$email,$contact,$editId);
    if ($save){
        echo "saved";
    }
}

if ($_POST['crudOperation'] == "getData") {
    $sr = 1;
    $tableData = '';
    $allData = $crudObj->getAllData($connection);
    if ($allData->num_rows>0) {
        while ($row = $allData->fetch_object()) {
            $tableData .= ' <tr>
                <td>'.$sr.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->contact.'</td>
                <td><a href="javaScript:void(0)" onclick="editData(\''.$row->id.'\',\''.$row->name.'\',\''.$row->email.'\',\''.$row->contact.'\');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a>
                <a href="javaScript:void(0)" onclick="deleteData(\''.$row->id.'\');" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash-o"></i></a>
                <i class="fa fa-spinner fa-spin" id="deleteSpinner'.$row->id.'" style="color: #ff195a;display: none"></i></td>
            </tr>';
            $sr++;
        }
    }
    echo $tableData;
}

if ($_POST['crudOperation'] == "deleteData"){
    $deleteId = $_POST['deleteId'];
    $delete = $crudObj->deleteData($connection,$deleteId);
    if ($delete){
        echo "deleted";
    }
}
