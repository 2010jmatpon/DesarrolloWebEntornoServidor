<?php
/*
    Hola Mundo FPDF
*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');
require('class/pdfArticulos.php');
require('datos/articulos.php');

$pdf = new PdfArticulos();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Courier', '', 10);

// $pdf->SetFont('Times', '', 10);
// $pdf->AddPage();

#Muestro título
$pdf->Titulo();
$pdf->Cabecera();

foreach($articulos as $articulo){
    $pdf->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['id']), 'B', 0, 'R');
    $pdf->Cell(90, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Posicion']), 'B', 0, 'C');
    $pdf->Cell(90, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Nombre']), 'B', 0, 'C');
}

$pdf->Output();
