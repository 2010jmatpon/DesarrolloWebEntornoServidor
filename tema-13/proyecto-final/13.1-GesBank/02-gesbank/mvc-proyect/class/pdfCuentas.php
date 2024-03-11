<?php


class PDFCuentas extends FPDF
{
    public function Header()
    {
        // $this->image('images/bank.png', 10, 2.5, 15);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(60, 16, 'GESBANK 1.0', 'B', 0, 'L');
        $this->Cell(70, 16, iconv('UTF-8', 'ISO-8859-1','Juan María Mateos Ponce'), 'B', 0, 'C');
        $this->Cell(60, 16, '2 DAW 23/24', 'B', 1, 'R');
        $this->ln(5);
        
    }

    public function Footer()
    {
        $this->setY(-10);
        $this->SetFont('Arial', 'B', 10);
    }

    public function Titulo()
    {
        $this->SetFont('Courier', 'B', 12);

        $this->SetFillColor(240);

        $this->Cell(95, 10, iconv('UTF-8', 'ISO-8859-1', 'Listado de Cuentas'), 0, 0, 'C', true);
        
        $this->SetFillColor(240);

        $this->Cell(95, 10, 'Fecha: ' . date('Y-m-d H:i:s'), 0, 1, 'L', true);

        $this->ln(15);
    }

    public function Encabezado(){
        $this->SetFont('Courier', 'B', 10);
        $this->SetFillColor(240);
        $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', 'Id'), 'B', 0, 'R', true);
        $this->Cell(60, 7, iconv('UTF-8', 'ISO-8859-1', 'Num Cuenta'), 'B', 0, 'C', true);
        $this->Cell(60, 7, iconv('UTF-8', 'ISO-8859-1', 'Cliente'), 'B', 0, 'C', true);
        $this->Cell(45, 7, iconv('UTF-8', 'ISO-8859-1', 'Fecha Alta'), 'B', 0, 'C', true);
        $this->Cell(15, 7, iconv('UTF-8', 'ISO-8859-1', 'Saldo'), 'B', 1, 'C', true);
    }

    public function Contenido($cuentas){
        foreach($cuentas as $cuenta){
            if ($this->GetY() + 4 > $this->PageBreakTrigger) { //verifica si el espacio que queda en la página es mayor que el valor especificado en $this->PageBreakTrigge,
                                                               // que es una propiedad de la clase FPDF que indica la distancia desde el borde superior de la página en la que se debe activar un salto de página automáticamente,
                                                               //Dentro del bloque if, se llama a $this->AddPage() para agregar una nueva página y $this->Encabezado() para imprimir el encabezado en esa nueva página.
                $this->AddPage();
                $this->Encabezado();
            }
            $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', $cuenta['id']), 'B', 0, 'R');
            $this->Cell(60, 7, iconv('UTF-8', 'ISO-8859-1', $cuenta['num_cuenta']), 'B', 0, 'C');
            $this->Cell(60, 7, iconv('UTF-8', 'ISO-8859-1', $cuenta['cliente']), 'B', 0, 'C');
            $this->Cell(45, 7, iconv('UTF-8', 'ISO-8859-1', $cuenta['fecha_alta']), 'B', 0, 'C');
            $this->Cell(15, 7, iconv('UTF-8', 'ISO-8859-1', $cuenta['saldo']), 'B', 1, 'C');
        }
    }
}