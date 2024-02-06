<?php
/*
    Hola Mundo FPDF
*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');

#Creamos objeto de la clase fpdf
$pdf=new FPDF();

#Añadimos nueva página
$pdf->AddPage();

#Establecemos tipo de letra
$pdf->SetFont('Arial','B',16);

#Creamos la primera celda
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1', '¡Mi primera página pdf con FPDF!'));

#Cerramos pdf
$pdf->Output();
?>
