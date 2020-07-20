
<?php
   require 'lib/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  
// Creates New Spreadsheet 
$spreadsheet = new Spreadsheet(); 
  
// Retrieve the current active worksheet 
$sheet = $spreadsheet->getActiveSheet(); 
  
// Set the value of cell A1 
$sheet->setCellValue('A1', 'GeeksForGeeks!'); 
  
// Sets the value of cell B1 
$sheet->setCellValue('B1', 'A Computer Science Portal For Geeks'); 

$newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'My Data');

// Set the value of cell A1 
$newSheet->setCellValue('A1', '11!'); 
  
// Sets the value of cell B1 
$newSheet->setCellValue('B1', 'Addd'); 

$spreadsheet->addSheet($newSheet, 0);

   
// Write an .xlsx file  
$writer = new Xlsx($spreadsheet); 
  
// Save .xlsx file to the current directory 
$writer->save('gfg.xlsx');