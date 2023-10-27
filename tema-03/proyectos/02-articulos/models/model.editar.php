<?php
/*
Modelo: model.editar.php
Descripcion: Edita los detalles de un articulo
*/
$articulos = generar_tabla();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];

$indice_editar = buscar_en_tabla($articulos, 'id', $id);

//Comparación estricta para distinguir el false del 0
if ($indice_editar !== false) {
    //Obtengo array del articulo a editar
    $articulo = $articulos[$indice_editar];

} else {
    echo 'ERROR: articulo no encontrado';
    exit();
}



?>