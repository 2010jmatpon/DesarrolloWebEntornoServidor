<?php

class PdfArticulos extends FPDF
{
    public function Header()
    {
        $this->image('logo/Cádiz_CF_logo.png', 10, 2.5, 15);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 16, 'Cadiz CF', 'B', 1, 'R');
        $this->ln(5);
    }

    public function Footer()
    {
        $this->setY(-10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }

    public function Titulo()
    {
        $this->SetFont('Courier', 'B', 12);

        $this->SetFillColor(240);

        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Plantilla'), 0, 0, 'C', true);

        $this->ln(15);
    }

    public function Cabecera(){
        $this->SetFont('Courier', 'B', 10);
        $this->SetFillColor(240);
        $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', 'Id'), 'B', 0, 'R', true);
        $this->Cell(90, 7, iconv('UTF-8', 'ISO-8859-1', 'Posición'), 'B', 0, 'C', true);
        $this->Cell(90, 7, iconv('UTF-8', 'ISO-8859-1', 'Nombre'), 'B', 1, 'C', true);
    }
}