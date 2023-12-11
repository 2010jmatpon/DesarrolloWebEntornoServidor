<?php

    /*

        model.ordenar.php

        Método GET:

            - criterio: de ordenación

    */

    // extrigo el criterio de ordenación URL
    $criterio = $_GET['criterio'];

    // Conectando a la base de datos FP
    $conexion = new Corredores();

    // objeto clase pdostatement ordenados por criterio
    $corredores = $conexion->order($criterio);
   


?>