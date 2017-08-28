<?php

require "../webdefinition.php";
require 'PHPExcel.php';
$excel=new PHPExcel();
$db=new database();

$excel->getProperties()->setCreator("Administrateur Atout-Protect")
    ->setLastModifiedBy("Administrateur Atout-Protect")
    ->setTitle("données licences atout-protect")
    ->setDescription("exportation des données licences du site atout-protect")
    ->setKeywords("excel atoutprotect ")
    ->setCategory("excel licences");

$excel->setActiveSheetIndex(0)
->getColumnDimension('A')
->setAutoSize(true);

$excel->setActiveSheetIndex(0)
    ->getColumnDimension('B')
    ->setAutoSize(true);

$excel->setActiveSheetIndex(0)
    ->getColumnDimension('C')
    ->setAutoSize(true);

$excel->setActiveSheetIndex(0)
    ->getColumnDimension('D')
    ->setAutoSize(true);

$excel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'LIBELLE')
    ->setCellValue('B1', 'SERIAL')
    ->setCellValue('C1', 'PROPRIETAIRE')
    ->setCellValue('D1', 'DATE ACHAT')
    ->setCellValue('E1', 'PRIX');

$row=LicenceController::GetLicencesOwner();

foreach($row as $key=>$value)
{
    

$y=$key+2;
    $excel->setActiveSheetIndex(0)
        ->setCellValue("A".$y,  $value['libelle'])
        ->setCellValue("B".$y, $value['Serial'])
        ->setCellValue("C".$y,  $value['utilisateur'])
        ->setCellValue("D".$y,  $value['date'])
        ->setCellValue("E".$y,  $value['Prix']);




}
$excel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="licences_export.csv"');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output');
exit;
?>