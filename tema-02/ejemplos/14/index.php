<?php
/*
Funcion is_null()

VERDADERO
- variable no definida
-variable asignada al valor null
FALSO
-asignar el valor 0
*/

//variable no definida
var_dump(is_null($var));

echo "<BR>";

//variable definida sin valor asignado
$var=null;
var_dump(is_null($var));
echo "<BR>";

//variable definida sin valor asignado
// unset($var);
// var_dump(is_null($var));
// echo "<BR>";

//Casos
//variable con cadena vacia
$var = "";
var_dump(is_null($var));
echo "<BR>";


//variable array
$var = [];
var_dump(is_null($var));
echo "<BR>";

?>