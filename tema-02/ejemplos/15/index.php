
<?php
/*
isset
FALSE
-variable no definida
-variable definida y asignada valor null
VERDADERO
-asignar valor 0
-asignar cualquier valor
-asignar cadena vacia
-asignar array vacio[]
*/
//isset() devuelve false por que $var no ha sido definida
var_dump( isset($var) );
//isset() devuelve false aunque la variable haya sido declarada pues //su valor es NULL
$var;
var_dump( isset($var) );
//isset() devuelve true. El valor ya no es nulo aunque esté vacío
$var = "";
var_dump( isset($var) );

?>