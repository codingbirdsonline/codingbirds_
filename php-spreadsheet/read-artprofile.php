
<?php
require 'lib/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

$spreadSheet = $Reader->load('141 blue-art-profile.xls');
$excelSheet = $spreadSheet->getActiveSheet();
$spreadSheetAry = $excelSheet->toArray();
$sheetCount = count($spreadSheetAry);

echo '<pre>';

$data = array();
for ($i = 45; $i < $sheetCount; $i ++) {
    $component = '';
    if (isset($spreadSheetAry[$i][0])) {
        $component =  $spreadSheetAry[$i][0];
    }
    $name = '';
    if (isset($spreadSheetAry[$i][3])) {
        $name =  $spreadSheetAry[$i][3];
    }
    $uom = '';
    if (isset($spreadSheetAry[$i][7])) {
        $uom = $spreadSheetAry[$i][7];
    }
    $qty = '';
    if (isset($spreadSheetAry[$i][8])) {
        $qty = $spreadSheetAry[$i][8];
    }

    // if (skipRows($name)){


        if ($name !="" && $uom !="" && $qty !="Quantity" && $qty !="Box"){
            $item[] = array(
                'component' => $component,
                'material' => $name,
                'uom' => $uom,
                'qty' => $qty,
            );
        }

    //}
}

print_r($item);


/*function skipRows($name)
{
    if ($name == "Chowdhary Overseas Limited" || $name == "M.R.P." || $name == "Group/Product Name"){
        return false;
    }else{
        return true;
    }
}*/
