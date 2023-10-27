<?php

$articulos = generar_tabla();
$categorias = generar_tabla_categorias();



$id = $_GET['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$id_editar = $_GET['id'];

$indice_libro_editar = buscar_en_tabla($articulos, 'id', $id_editar);


$edit_articulo = [
    'id' => $id,
    'descripcion' => $descripcion,
    'modelo' => $modelo,
    'categoria' => $categoria,
    'unidades' => $unidades,
    'precio' => $precio

];

$articulos[$indice_libro_editar] = $edit_articulo;


?>