<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Jakarta');


if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
    

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Marsono Saputro")
							 ->setLastModifiedBy("Marsono Saputro")
							 ->setTitle("Data Siswa PPDB 2015")
							 ->setSubject("Sistem Pendaftaran Online SIT Nur Hidayah Surakarta")
							 ->setDescription("Created by plugin PHPExcel versi 2007")
							 ->setKeywords("office 2007 By Marsono Saputro")
							 ->setCategory("Office 2007");

// Data Sheet 1
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID SISWA')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'NAMA LENGKAP')
            ->setCellValue('D1', 'NAMA PANGGILAN')
            ->setCellValue('E1', 'TEMPAT LAHIR')
            ->setCellValue('F1', 'TANGGAL LAHIR')
            ->setCellValue('G1', 'KELAMIN')
            ->setCellValue('H1', 'ASAL SEKOLAH')
            ->setCellValue('I1', 'ALAMAT SEKOLAH')
            ->setCellValue('J1', 'BB(KG)')
            ->setCellValue('K1', 'TB(CM)')
            ->setCellValue('L1', 'JARAK(KM)')
            ->setCellValue('M1', 'KPS');
$no=2;
foreach($siswa as $d){
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$no, $d->id_siswa)
            ->setCellValue("B".$no, "'".$d->nik)
            ->setCellValue("C".$no, strtoupper($d->namalengkap))
            ->setCellValue("D".$no, strtoupper($d->namapanggilan))
            ->setCellValue("E".$no, strtoupper($d->tempatlahir))
            ->setCellValue("F".$no, strtoupper($d->tgllahir))
            ->setCellValue("G".$no, strtoupper($d->kelamin))
            ->setCellValue("H".$no, strtoupper($d->asalsekolah))
            ->setCellValue("I".$no, strtoupper($d->alamatsekolah))
            ->setCellValue("J".$no, strtoupper($d->bb))
            ->setCellValue("K".$no, strtoupper($d->tb))
            ->setCellValue("L".$no, strtoupper($d->km))
            ->setCellValue("M".$no, strtoupper($d->kps));
    $no++;
}       
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Data Siswa');

// SHEET 2
$objWorksheet = $objPHPExcel->createSheet();
$objWorksheet->setTitle('Data Ayah');
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A1', 'ID SISWA')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'NAMA AYAH')
            ->setCellValue('D1', 'TEMPAT LAHIR')
            ->setCellValue('E1', 'TANGGAL LAHIR')
            ->setCellValue('F1', 'PENDIDIKAN')
            ->setCellValue('G1', 'PEKERJAAN')
            ->setCellValue('H1', 'ALAMAT KERJA')
            ->setCellValue('I1', 'JARAK KANTOR')
            ->setCellValue('J1', 'PENGHASILAN')
            ->setCellValue('K1', 'NO HP');
$no=2;
foreach($ayah as $d){
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue("A".$no, $d->id_siswa)
            ->setCellValue("B".$no, "'".$d->nik)
            ->setCellValue("C".$no, strtoupper($d->namalengkap))
            ->setCellValue("D".$no, strtoupper($d->tempatlahir))
            ->setCellValue("E".$no, strtoupper($d->tgllahir))
            ->setCellValue("F".$no, strtoupper($d->pendidikan))
            ->setCellValue("G".$no, strtoupper($d->pekerjaan))
            ->setCellValue("H".$no, strtoupper($d->alamatkantor))
            ->setCellValue("I".$no, strtoupper($d->jarakkekantor))
            ->setCellValue("J".$no, strtoupper($d->gaji))
            ->setCellValue("K".$no, "'".strtoupper($d->nohp));
    $no++;
}      

// SHEET 3
$objWorksheet = $objPHPExcel->createSheet();
$objWorksheet->setTitle('Data Ibu');
$objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A1', 'ID SISWA')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'NAMA IBU')
            ->setCellValue('D1', 'TEMPAT LAHIR')
            ->setCellValue('E1', 'TANGGAL LAHIR')
            ->setCellValue('F1', 'PENDIDIKAN')
            ->setCellValue('G1', 'PEKERJAAN')
            ->setCellValue('H1', 'ALAMAT KERJA')
            ->setCellValue('I1', 'JARAK KANTOR')
            ->setCellValue('J1', 'PENGHASILAN')
            ->setCellValue('K1', 'NO HP');
$no=2;
foreach($ibu as $d){
$objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue("A".$no, $d->id_siswa)
            ->setCellValue("B".$no, "'".$d->nik)
            ->setCellValue("C".$no, strtoupper($d->namalengkap))
            ->setCellValue("D".$no, strtoupper($d->tempatlahir))
            ->setCellValue("E".$no, strtoupper($d->tgllahir))
            ->setCellValue("F".$no, strtoupper($d->pendidikan))
            ->setCellValue("G".$no, strtoupper($d->pekerjaan))
            ->setCellValue("H".$no, strtoupper($d->alamatkantor))
            ->setCellValue("I".$no, strtoupper($d->jarakkekantor))
            ->setCellValue("J".$no, strtoupper($d->gaji))
            ->setCellValue("K".$no, "'".strtoupper($d->nohp));
    $no++;
}
            
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a clientâ€™s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Pendaftaran SDIT 2015.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
