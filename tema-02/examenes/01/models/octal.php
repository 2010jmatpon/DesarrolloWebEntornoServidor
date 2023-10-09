<?php

#Declaro la variable para el cálculo
$Decimal = $_POST['vDec'];

#Declaro una variable con el nombre de la operación para llamarla después en la vista resultado.
$operacion = "OCTAL";

#Realizo la operación
$resultado=decoct($Decimal);
?>