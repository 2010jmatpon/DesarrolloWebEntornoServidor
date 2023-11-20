<?php

    /*

        Modelo: model.nuevo.php
        Descripcion: carga array categorias generar el select dinámico de categorías

    */

    # cargamos la tabla
    $fp = new Fp();

    #Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();
    $articulos -> getDatos();


?>