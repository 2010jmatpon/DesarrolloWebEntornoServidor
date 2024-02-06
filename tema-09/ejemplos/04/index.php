<?php
/*
    Hola Mundo FPDF
*/

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Declaro unas variables
$id = 1;
$apellidos = 'García Pérez';
$nombre = 'Richy';

#Creamos objeto de la clase fpdf
$pdf=new FPDF('L', 'mm', 'A4');

#Establecemos tipo de letra
         #font-family style size
$pdf->SetFont('Courier','B',16);

#Establecemos color de fondo de celda
$pdf->SetFillColor(146, 25, 251);

#Añadimos nueva página
$pdf->AddPage();

#Creamos la primera celda
$pdf->Cell(60,10, iconv('UTF-8', 'ISO-8859-1', 'id: '), 1, 0, 'R', true);
$pdf->Cell(0,10, iconv('UTF-8', 'ISO-8859-1', $id), 1, 1);
$pdf->Cell(60,10, iconv('UTF-8', 'ISO-8859-1', 'Nombre: '), 1, 0, 'R', true);
$pdf->Cell(0,10, iconv('UTF-8', 'ISO-8859-1', $nombre), 1, 1);
$pdf->Cell(60,10, iconv('UTF-8', 'ISO-8859-1', 'Apellidos: '), 1, 0, 'R', true);
$pdf->Cell(0,10, iconv('UTF-8', 'ISO-8859-1', $apellidos), 1);

#Cerramos pdf
$pdf->Output('I', 'doc.pdf', true);
?>
