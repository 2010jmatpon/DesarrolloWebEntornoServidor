<?php

$articulos = generar_tabla();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];

#obtener el indice del articulo
$indice_mostrar = buscar_en_tabla($articulos, 'id', $id);
//
#creo un array asociativo con los detalles del articulo modificado
if ($indice_mostrar !== false) {
    //Obtengo array del articulo a editar
    $articulo = $articulos[$indice_mostrar];

} else {
    echo 'ERROR: articulo no encontrado';
}


?>