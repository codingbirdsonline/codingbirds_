
<?php
require 'lib/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include "config.php";

$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadSheet = $Reader->load('mrp 141 all colors.xlsx');
$excelSheet = $spreadSheet->getActiveSheet();
$spreadSheetAry = $excelSheet->toArray();
$sheetCount = count($spreadSheetAry);

echo '<pre>';
$data = array();
for ($i = 3; $i < $sheetCount; $i ++) {

    if (isset($spreadSheetAry[$i][0])) {
        $name =  trim($spreadSheetAry[$i][0]);
    }
    $uom = '';
    if (isset($spreadSheetAry[$i][1])) {
        $uom = trim($spreadSheetAry[$i][1]);
    }
    $stock = '';
    if (isset($spreadSheetAry[$i][6])) {
        $stock = trim($spreadSheetAry[$i][6]);
        $stock = (($stock ==""?0:$stock));
    }

    //if (skipRows($name)){


            if ($uom !=""){
                $item[] = array(
                    'name' => $name,
                    'uom' => $uom,
                    'stock' => $stock,
                );
               // $query = "insert into mrps SET material='$name',uom='$uom',stock='$stock' ";
               // $insertId = $connection->query($query) or die("Errr".$connection->error);
            }

   // }

}
$data = $item;
print_r($data);


