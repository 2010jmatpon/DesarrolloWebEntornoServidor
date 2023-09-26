<?php
    /*
    Archivo:index.php
    Descripción: Controlador ejemplo
    Autor: Juan Carlos
    Fecha: 26/09/23
    */

    $alumno = "Juan María";

    
    print "El alumno es: ";
    print $alumno;

    echo "<br>";
    echo 123.45;
    // valores numéricos sin comillas
    echo "<br>";

    // tanto echo como print son funciones, la sintáxisde PHP admite el no uso de ()

    // echo puede mostrar varias cadenas es decir varios argumentos
    echo "Mi nombre es: ", "Juan M";
    echo "<br>";

    // echo permite varios argumentos de entrada y print solo uno, sin embargo podemos usar el punto como operador de concatenado
    print "Mi nombre es: ". "Juan M";

?>