<?php

    /*

        Modelo: model.index.php
        Descripcion: genera en array los datos de los artículos

    */

    setlocale(LC_MONETARY,"es_ES");

    #Cargamos los arrays a partir de los métodos estáticos de la clase
    #ArrayArticulos
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    #Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();
    $articulos -> getDatos();
    

   

    

?>