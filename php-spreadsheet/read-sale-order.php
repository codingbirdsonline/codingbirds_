
<?php
require 'lib/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
include "config.php";

$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

$spreadSheet = $Reader->load('sale order 01.xls');
$excelSheet = $spreadSheet->getActiveSheet();
$spreadSheetAry = $excelSheet->toArray();
$sheetCount = count($spreadSheetAry);

$loop = 0;
echo '<pre>';
$data = array();
for ($i = 10; $i < $sheetCount; $i ++) {
    $name = '';
    if (isset($spreadSheetAry[$i][0])) {
        $name =  $spreadSheetAry[$i][0];
    }
    $uom = '';
    if (isset($spreadSheetAry[$i][1])) {
        $uom = $spreadSheetAry[$i][1];
    }
    $qty = '';
    if (isset($spreadSheetAry[$i][2])) {
        $qty = $spreadSheetAry[$i][2];
    }
    $loop++;
    if (skipRows($qty)){


        if ($uom !="" && $qty !="" && $qty !="Qty."){
            $item[] = array(
                'material' => $name,
                'uom' => $uom,
                'qty' => $qty,
            );
        }

    }
}

print_r($item);
echo 'loop'.$loop;


function skipRows($name)
{
    if ($name == "(produ)"){
        return false;
    }else{
        return true;
    }
}
