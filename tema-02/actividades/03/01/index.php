<?php
// Ejercicio 1: Conversiones de datos en expresiones
// Multiplica valor entero con una cadena que contiene un número inicial
$valorEntero = 2;
$cadenaNumero = "999 hola";
var_dump($valorEntero * $cadenaNumero);

echo '<br>';
// Sumar valor entero con cadena con número inicial
$valorEntero = 5;
$cadenaNumero = "10 juan";
var_dump($valorEntero + $cadenaNumero);

echo '<br>';

// Sumar valor entero con valor float
$valorEntero = 2;
$valorFloat = 45.3;
var_dump($valorEntero + $valorFloat);
echo '<br>';

// Concatenar valor entero con cadena
$valorEntero = 7;
$cadena = "Betis bueno ahi ";
var_dump($cadena . $valorEntero);
echo '<br>';

// Sumar valor entero con valor booleano
$valorEntero = 16;
$valorBooleano = false;
var_dump($valorEntero + $valorBooleano);
?>