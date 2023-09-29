<?php
    $int = 7;
    $float = 1.5;

    $suma = $int + $float;
    $resta = $int - $float;
    $division = $int / $float;
    $multiplicacion = $int * $float;
    $potencia = pow($int, $float);

    echo "\$suma: ";
    var_dump($suma);

    echo "<BR>";

    echo "\$resta: ";
    var_dump($resta);

    echo "<BR>";

    echo "\$division: ";
    var_dump($division);
    
    echo "<BR>";

    echo "\$multiplicacion: ";
    var_dump($multiplicacion);

    echo "<BR>";

    echo "\$potencia: ";
    var_dump($potencia);
?>