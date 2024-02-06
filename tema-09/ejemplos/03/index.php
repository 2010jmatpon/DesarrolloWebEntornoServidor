<?php
/*
    Hola Mundo FPDF
*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');

#Creamos objeto de la clase fpdf
$pdf=new FPDF('P', 'mm', 'A4');

#Establecemos tipo de letra
         #font-family style size
$pdf->SetFont('Courier','B',16);

#Añadimos nueva página
$pdf->AddPage();

#Creamos la primera celda
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1', '¡Mi primera página pdf con FPDF!'));

#Establecemos tipo de letra
$pdf->SetFont('Helvetica','UIB',16);

#Añadimos nueva página
$pdf->AddPage('L');

#Creamos la primera celda
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1', '¡Mi segunda página pdf con FPDF!'));

#Cerramos pdf
$pdf->Output();
?>
