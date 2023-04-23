<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$mysqli = require __DIR__ . "/db.php";
    $sql = ("SELECT * FROM example;");
    $result = $mysqli->query($sql);

require_once "vendor/autoload.php";
    
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);
    
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();
    
$activeSheet->setCellValue('A1', 'id');
$activeSheet->setCellValue('B1', 'text');
$activeSheet->setCellValue('C1', 'number1');
$activeSheet->setCellValue('D1', 'number2');    
$activeSheet->setCellValue('E1', 'sum');    
    
$i = 2;
foreach ($result as $row):
    $activeSheet->setCellValue('A'.$i , $row['id']);
    $activeSheet->setCellValue('B'.$i , $row['text']);
    $activeSheet->setCellValue('C'.$i , $row['number1']);
    $activeSheet->setCellValue('D'.$i , $row['number2']);
    $activeSheet->setCellValue('E'.$i , $row['sum']);

    $i++;
endforeach;

    
$filename = 'data.xlsx';
    
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
header("Location: data.php");