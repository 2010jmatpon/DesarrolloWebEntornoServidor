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
$id = $_GET['id'];

#obtener el indice del libro
$indice_mostrar = buscar_en_tabla($libros, 'id', $id);

#creo un array asociativo con los detalles del libro modificado
if ($indice_mostrar == 'false') {
    //Obtengo array del libro a editar
    $libro = $libros[$indice_mostrar];

} else {
    echo 'ERROR: libro no encontrado';
}


?>