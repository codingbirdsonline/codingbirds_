<?php
include "config.php";
include_once "Common.php";
$common = new Common();
$records = $common->getAllRecords($connection);
$dataTable = '';
$dataTable .='<table class="table">
                   <thead>
                       <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Total Markes</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>';
    if ($records->num_rows>0) {
        $sr = 1;
        while ($record = $records->fetch_object()) {
            $recordId = $record->id;
            $name = $record->name;
            $class = $record->class;
            $marks = $record->marks;
            $gender = $record->gender;
            $dataTable .='
            <tr>
                <td>'.$sr.'</td>
                <td>'.$name.'</td>
                <td>'.$class.'</td>
                <td>'.$marks.'</td>
                <td>'.$gender.'</td>
            </tr>';

            $sr++;
        }
    }
    $dataTable .= '  </tbody>
                    </table>';
    $filename = "exported-data-".date('d-m-Y H:i:s').".xls";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename='.$filename);
    echo $dataTable;


