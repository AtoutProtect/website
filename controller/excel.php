<?php

require "../webdefinition.php";
require 'PHPExcel.php';
$excel=new PHPExcel();
$db=new database();

$excel->getProperties()->setCreator("Administrateur Atout-Protect")
    ->setLastModifiedBy("Administrateur Atout-Protect")
    ->setTitle("données clients atout-protect")
    ->setDescription("exportation des données clients du site atout-protect")
    ->setKeywords("excel atoutprotect ")
    ->setCategory("excel clients");

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
    ->setCellValue('A1', 'NOM')
    ->setCellValue('B1', 'PRENOM')
    ->setCellValue('C1', 'EMAIL')
    ->setCellValue('D1', 'ADRESSE');

$row=$db->rowSelect(null,array("user"),100);

foreach($row as $key=>$value)
{
$y=$key+2;
    $excel->setActiveSheetIndex(0)
        ->setCellValue("A".$y, $value['name'])
        ->setCellValue("B".$y,  $value['nickname'])
        ->setCellValue("C".$y,  $value['email'])
        ->setCellValue("D".$y,  $value['adresse']);




}
$excel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="excel.xls"');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output');
exit;
?>