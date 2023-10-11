<?php
//Variable de tipo entero
$nota = 6;

if($nota < 5){
    echo "Suspenso";
} else if ($nota < 6){
    echo "Suficiente";
} else if ($nota <7){
    echo "Bien";
} else if ($nota < 9){
    echo "Notable";
} else if ($nota<=10){
    echo "Sobresaliente";
} else{
    echo "Valor no permitico";
}
?>