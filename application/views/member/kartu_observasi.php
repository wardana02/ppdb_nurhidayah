<?php

/**
 * @author Marsono Saputro
 * @copyright 2014
 */

class PDF extends FPDF {
    function Header ()
    {
        //Atur ke posisi 1 cm dari atas
        $this->SetY(1);
        $this->SetFont('Arial','B',19);
        $this->Cell(0,0.7,'KARTU OBSERVASI',0,1,'C');
        $this->SetFont('Arial','B',14);
        $this->Cell(0,0.7,'Jaring Generasi Emas SDIT eNHa',0,1,'C');
        $this->Cell(0,0.7,'Tahun Pelajaran 2015/2016',0,1,'C');
    }
    function Footer()
    {
        //Atur ke posisi 1 cm dari bawah
        $this->SetY(0);
    }
}

function nama($nama)
{
    $x = explode(" ", $nama);
    $a = !empty($x[0]) ? $x[0] : '';
    $b = !empty($x[1]) ? $x[1] : '';
    $c = !empty($x[2]) ? substr($x[2],0,1).'.' : '';
    $d = !empty($x[3]) ? substr($x[3],0,1).'.' : '';
    $e = !empty($x[4]) ? substr($x[4],0,1).'.' : '';
    
    return $a.' '.$b.' '.$c.' '.$d.' '.$e; 
}


$pdf=new PDF('P','cm',array(10.5,16.5));
$pdf->AliasNbPages();

$pdf->SetMargins(0.5,0,0.5);
$pdf->SetFont('Arial','',15);

$pdf->AddPage();
//BINGKAI
$pdf->Rect(0.5,0.5,9.5,15.5,'D');
$pdf->Rect(0.6,0.6,9.3,15.3,'D');
$pdf->Line(1,3.1,9.5,3.1);
$pdf->Line(1,3.17,9.5,3.17);

//NAMA LENGKAP
$pdf->SetY(4.5);
$pdf->SetFont('Arial','U',24);
$pdf->Cell(0,0.7, nama($siswa->namalengkap),0,1,'C');

//FOTO
$pdf->Rect(3.6,5.7,3.2,4.2,'D');
if(!empty($siswa->foto))
{
    $pdf->Image(base_url().'foto/'.$siswa->foto,3.7,5.8,3,4);
}

//ID SISWA
$pdf->SetY(9.6);
$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,2,$siswa->id_siswa,0,1,'C');

//OPTION
$pdf->SetY(11.5);
$pdf->SetFont('Arial','',13);
$pdf->Rect(1,11.5,0.5,0.5,'D');
$pdf->Cell(1);
$pdf->Cell(3.5,0.6,'Observasi',0,0);

$pdf->Rect(5.5,11.5,0.5,0.5,'D');
$pdf->Cell(1);
$pdf->Cell(5,0.6,'Ummi',0,0);

$pdf->Rect(1,12.3,0.5,0.5,'D');
$pdf->SetY(12.3);
$pdf->Cell(1);
$pdf->Cell(5,0.6,'Kesehatan',0,0);


$pdf->Output('Observasi.pdf','I');