<?php
/*
Modelo: model.create.php
Descripcion: Genera los datos de los libros
*/

$articulos = generar_tabla();
$categorias = generar_tabla_categorias();

$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$new_articulo = [
    'id' => sizeof($articulos) + 1,
    'descripcion' => $descripcion,
    'modelo' => $modelo,
    'categoria' => $categoria,
    'unidades' => $unidades,
    'precio' => $precio

];

array_push($articulos, $new_articulo);


?>