<?php
$articulos = generar_tabla();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];

$indice_eliminar = buscar_en_tabla($articulos, 'id', $id);

//Comparación estricta para distinguir el false del 0
if ($indice_eliminar !== false) {
    //Obtengo array del libro a editar
    unset ($articulos[$indice_eliminar]);

    $articulos=array_values($articulos);

} else {
    echo 'ERROR: articulo no encontrado';
    exit();
}
?>