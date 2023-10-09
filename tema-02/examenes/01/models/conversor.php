<?php
#Declaro la variable
$Decimal = $_POST['vDec'];

#Operación para binario
$binario=decbin($Decimal);

#Operación para hexadecimal
$hex=dechex($Decimal);

#Operación para octal
$octal=decoct($Decimal);

?>