<?php
//require_once "lib/PHPExcel/Classes/PHPExcel.php";
require_once "lib/PHPExcel/Classes/PHPExcel/IOFactory.php";

$inputFileName = 'Acss-64 MRP.xlsx';
$column1Array = array();
echo '<pre>';
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true); //optional

$objPHPExcel = $objReader->load($inputFileName);
$objWorksheet = $objPHPExcel->getActiveSheet();

$i=1;
foreach ($objWorksheet->getRowIterator() as $row) {

    $column_A_Value = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();//column A
    $column_B_Value = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();//column A
    //you can add your own columns B, C, D etc.

    //inset $column_A_Value value in DB query here

    if ($column_A_Value !="Chowdhary Overseas Limited" && $column_A_Value !="M.R.P." && $column_A_Value !="Group/Product Name"){
        $item[] = $column_A_Value;
        $column1Array['productName'] = $item;
    }

    $i++;
}

print_r($column1Array);
