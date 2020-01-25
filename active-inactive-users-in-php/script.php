<?php
include "config.php";
if ($_POST['key'] == "getAllUsers") {
    $tableData = '';
    $sr = 1;
    $query = "SELECT * FROM bird_active_inactive_users";
    $result = $connection->query($query);
    if ($result->num_rows>0){
        while ($row = $result->fetch_object()){
            $buttonActive = (($row->status == 0)?'block':'none');
            $buttonInActive = (($row->status == 1)?'block':'none');
            $tableData .='<tr>
                <td>'.$sr.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->contact.'</td>
                <td><a href="javaScript:void(0)" title="Active" style="display:'.$buttonActive.'" id="activeBtn'.$row->id.'" onclick="activeInactive(\''.$row->id.'\',1);" class="btn btn-success btn-sm"> <i class="fa fa-thumbs-up"></i></a>
                <a href="javaScript:void(0)" title="In active" style="display:'.$buttonInActive.'" id="inactiveBtn'.$row->id.'" onclick="activeInactive(\''.$row->id.'\',0);" class="btn btn-danger btn-sm"> <i class="fa fa-thumbs-down"></i></a> </td>
            </tr>';
            $sr++;
        }
    }
    echo $tableData;

}

if ($_POST['key'] == "activeInactive"){
    $status = $_POST['status'];
    $recordId = $_POST['recordId'];
    $query = "UPDATE bird_active_inactive_users SET status='$status' WHERE id='$recordId'";
    $result = $connection->query($query);
    if ($result){
        echo "success";
    }

}
