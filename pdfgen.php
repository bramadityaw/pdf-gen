<?php
require('./fpdf.php');

$pdf = new FPDF();
$title = 'Biodata Diri';
$profile = './public/src/moeslimar.jpg';

$centerX = $pdf->GetPageWidth() / 2;
$biodata = array(
    "Nama" => 'Aditya Wicaksono',
    "NIM" => 'J3C205003',
    "Jenis Kelamin" => "Pria",
    "Tempat Lahir" => 'Serang',
    "Tanggal Lahir" => '4 Juli 1987',
    "Email" => 'adityawicaksono@apps.ipb.ac.id',
    "Telepon" => '085782208246',
    "Program Studi" => 'Teknologi Rekayasa Perangkat Lunak A1',
);


$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY($centerX - $pdf->GetStringWidth($title) / 2, 10);
$pdf->Cell(40, 10, $title);
$pdf->SetXY(30, 30);
$pdf->Image($profile, null, null, 50, 50);
$pdf->SetXY($centerX, 30);

foreach ($biodata as $field=>$value) {
    $pdf->SetX($centerX);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(40, 10, $field);
    $pdf->Ln(5);
    $pdf->SetX($centerX);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 10, $value);
    $pdf->Ln();
}

$pdf->Output();
?>