<?php
/*
Modelo: producto.php
Descripcion: multiplica los valores del formulario
*/

$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];

//Creo otra variable para guardar la operación realizada
$operacion = "Multiplicar";

//Realizo los cálculos y lo almaceno en la variable resultado
$resultado = $valor1 * $valor2;
?>