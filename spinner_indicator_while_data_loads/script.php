<?php
include "config.php";
include_once "Common.php";

if (isset($_POST['api']) == "getData") {
    $sr = 1;
    $tableData = '';
    $common = new Common();
    $data = $common->getData($connection);
    if ($data->num_rows > 0 ){
        while ($row = $data->fetch_object()) {
            $tableData .= '<tr>
                    <td>'.$sr.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->class.'</td>
                    <td>'.$row->marks.'</td>
                    <td>'.$row->gender.'</td>
        </tr>';
            $sr++;
        }
        echo 'test^'.$tableData;
    }
}
