<?php

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

$id = $_GET['indice'];

$articulo = $articulos->buscarId($id);

?>