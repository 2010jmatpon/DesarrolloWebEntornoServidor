<?php
/*
    Hola Mundo FPDF
*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');
// require('class/pdfArticulos.php');

$pdf = new FPDF();

$pdf->SetFont('Times', '', 10);
$pdf->AddPage();

$pdf->Image('logo/Cádiz_CF_logo.png', 32, 5, 150, 250);
$pdf->Output();
