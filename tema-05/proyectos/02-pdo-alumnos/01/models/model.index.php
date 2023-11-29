<?php

    /*

        Modelo Principal index

    */

    # conectamos a fp
    $conexion = new Alumnos();

    #Extraigo los valores de los alumnos
    $alumnos = $conexion->getAlumnos();

    

?>