<?php
/*
Modelo: model.eliminar.php
Descripcion: Genera los datos de los libros
*/
$libros = generar_tabla();

$id = $_GET['id'];

$indice_eliminar = buscar_en_tabla($libros, 'id', $id);

if ($indice_eliminar !== false) {
    //elimino el libro seleccionado
    unset($libros[$indice_eliminar]);
    //reconstruyo el array
    $libros = array_values($libros);
} else {
    echo 'ERROR: libro no encontrado';
    exit();
}



?>