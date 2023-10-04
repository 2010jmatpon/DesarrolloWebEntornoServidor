<?php
$var=3;

//Funciones de conversión
$var1=strval($var);
$var2=intval($var);
$var3=floatval($var);

//var_dump() nos muestra el tipo de datos y el valor
var_dump($var1);
var_dump($var2);
var_dump($var3);

echo '<br>';

//Funcion settype
settype($var1, "integer");
settype($var2, "float");
settype($var3, "string");
settype($var4, "boolean");

//var_dump() nos muestra el tipo de datos y el valor
var_dump($var1);
var_dump($var2);
var_dump($var3);
var_dump($var4);

echo '<br>';

//Conversión forma implícita
$var1=(int) $var;
$var2=(float) $var;
$var3=(string) $var;
$var4=(array) $var;

//var_dump() nos muestra el tipo de datos y el valor
var_dump($var1);
var_dump($var2);
var_dump($var3);
var_dump($var4);
?>