<?php
/*
Modelo: model.create.php
Descripcion: añade un nuevo libro a la tabla
METODO POST:
    -id
    -titulo
    -autor
    -genero
    -precio
*/
$articulos = generar_tabla();
$categorias = generar_tabla_categorias();

$criterio = $_GET['criterio'];

$aux = array_column($articulos, $criterio);

if(!in_array($criterio, $aux) === false) {
    echo "ERROR: Criterio de ordenación inexistente";
    exit(); 
}

array_multisort($aux, SORT_ASC, $articulos);

?>