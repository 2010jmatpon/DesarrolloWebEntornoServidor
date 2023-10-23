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
$criterio = $_GET['criterio'];

$aux = array_column($libros, $criterio);

if(!in_array($criterio, $aux) === false) {
    echo "ERROR: Criterio de ordenación inexistente";
    exit(); 
}

array_multisort($aux, SORT_ASC, $libros);

?>