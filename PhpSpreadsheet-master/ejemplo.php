<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
require_once __DIR__ . '/src/Bootstrap.php';
$helper = new Sample();

$inputFileName = __DIR__ . '/VE01.xlsx';
$spreadsheet = IOFactory::load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


echo "<pre>";
print_r($sheetData);
