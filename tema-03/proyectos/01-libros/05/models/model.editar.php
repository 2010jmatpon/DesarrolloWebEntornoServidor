<?php
/*
Modelo: model.editar.php
Descripcion: Edita los detalles de un libro
*/
$id = $_GET['id'];

$indice_editar = buscar_en_tabla($libros, 'id', $id);

//Comparación estricta para distinguir el false del 0
if ($indice_editar !== false) {
    //Obtengo array del libro a editar
    $libro = $libros[$indice_editar];

} else {
    echo 'ERROR: libro no encontrado';
    exit();
}



?>