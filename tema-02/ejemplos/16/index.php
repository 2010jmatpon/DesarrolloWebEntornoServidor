<?php
/*
isset
VERDADEROS
-variable no definida sin generar aviso
-variable definida y asignada valor null
-asignar valor 0
-asignar array vacio[]
-asignar false
-asignar ""
FALSE
-asignar cualquier valor
-asignar cadena vacia
*/
//La variable no está definida. empty() devuelve true
var_dump( empty($var) );
//empty() devuelve true. El valor de $var es nulo
$var;
var_dump( empty($var) );
//empty() devuelve true para un string vacío
$var = "";
var_dump( empty($var) );
//empty() devuelve true para un array vacío
$var = array();
var_dump( empty($var) );
//empty() devuelve true para el string "0"
$var = "0";
var_dump( empty($var) );
//empty() devuelve true para el número entero 0
$var = 0;
var_dump( empty($var) );
//empty() devuelve true para el valor lógico false
$var = false;
var_dump( empty($var) );
//empty() devuelve false para el valor lógico true
$var = true;
var_dump( empty($var) );
?>