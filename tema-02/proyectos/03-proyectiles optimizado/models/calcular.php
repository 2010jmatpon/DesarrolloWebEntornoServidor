<?php
/*
Modelo: calcular.php
Descripcion: Calcula los valores del formulario
*/

$vIni = $_POST['vIni'];
$angulo = $_POST['angulo'];
//Defino constante gravedad
define("G", 9.8);

//Angulo radianes --> Realizo los cálculos y lo almaceno en la variable resultado
$radianes = deg2rad($angulo);

//Velocidad Inicial X
$Vox = $vIni *cos($radianes);

//Velocidad Inicial Y
$Voy = $vIni *sin($radianes);

//Alcance Max
$xMax = pow($vIni,2) *sin(2*$radianes) / G;

//Tiempo de Vuelo
$tiempo = 2 * ($Voy/G);

//Altura Max
$yMax =(pow($vIni, 2) * pow(sin($radianes), 2)) / (2*G);

//Redondeo
$radianes = number_format($radianes, 5, ",",".");
$Vox = number_format($Vox, 2,",",".");
$Voy = number_format($Voy, 2,",",".");
$xMax = number_format($xMax, 2,",",".");
$tiempo = number_format($tiempo, 2,",",".");
$yMax = number_format($yMax, 2,",",".");
?>