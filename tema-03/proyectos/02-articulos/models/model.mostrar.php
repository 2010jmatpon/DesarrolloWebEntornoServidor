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

$id = $_GET['id'];

#obtener el indice del libro
$indice_mostrar = buscar_en_tabla($articulos, 'id', $id);
//
#creo un array asociativo con los detalles del libro modificado
if ($indice_mostrar !== false) {
    //Obtengo array del libro a editar
    $articulo = $articulos[$indice_mostrar];

} else {
    echo 'ERROR: articulo no encontrado';
}


?>