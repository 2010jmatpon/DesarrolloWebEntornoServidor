<?php

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulo = new Articulo();
$articulos->getDatos();

$id = $_GET['id'];

$articulo = $articulos->buscarId($id);

$descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $categoriasArt = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];

    # Editamos los valores del articulo con los valores

    $articulo->setDescripcion($descripcion);
    $articulo->setModelo($modelo);
    $articulo->setMarca($marca);
    $articulo->setCategorias($categoriasArt);
    $articulo->setUnidades($unidades);
    $articulo->setPrecio($precio);

    $articulos->update($articulo, $id );

    # Generamos una notificación
    $notificacion = 'Articulo modificado con éxito';
?>