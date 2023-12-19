<?php

    /*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */
        
    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $autor_id = $_POST['autor_id'];
    $editorial_id = $_POST['editorial_id'];
    $precio_coste = $_POST['precio_coste'];
    $precio_venta = $_POST['precio_venta'];
    $stock = $_POST['stock'];
    $fecha_edicion = $_POST['fecha_edicion'];

    $libro = new Libro();

    $libro->id=null;
    $libro->isbn = $isbn;
    $libro->titulo = $titulo;
    $libro->autor_id = $autor_id;
    $libro->editorial_id = $editorial_id;
    $libro->precio_coste = $precio_coste;
    $libro->precio_venta = $precio_venta;
    $libro->stock = $stock;
    $libro->fecha_edicion = $fecha_edicion;

    // var_dump ($libro);
    // exit();

    $conexion= new Libros();

    $conexion->insertarLibro($libro);

?>