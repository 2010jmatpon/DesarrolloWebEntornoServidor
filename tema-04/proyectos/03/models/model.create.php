<?php

    /*

        Modelo: model.create.php
        Descripcion: añade un nuevo  artículo en a la tabla

        Método POST:
                    - descripcion
                    - modelo
                    - genero
                    - unidades
                    - precio

    */

    # cargamos la tabla
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    #Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();
    $articulos -> getDatos();

    $id=$_POST['id'];
    $descripcion=$_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];
    

    $articulo = new Articulo(
        $id,
        $descripcion,
        $modelo,
        $marca,
        $categoria,
        $unidades,
        $precio
        
    );


    $articulos -> create($articulo);

    $notificacion = "Articulo creado con éxito";

?>