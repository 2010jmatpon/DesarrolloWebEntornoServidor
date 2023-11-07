<?php

include("class/class.calculadora.php");


$calcular = new Calculadora();


$calcular->setValor1(4);
$calcular->setValor2(5);
$calcular->sumar();

var_dump($resultado);
exit();


?>