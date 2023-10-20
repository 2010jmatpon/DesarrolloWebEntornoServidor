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
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];


#obtener el id del libro que quiero editar

$id_editar = $_GET['id'];
#obtener el indice del libro
$indice_libro_editar = buscar_en_tabla($libros, 'id', $id_editar);

#creo un array asociativo con los detalles del libro modificado
$libro = [
    'id'=> $id,
    'titulo'=> $titulo,
    'autor'=> $autor,
    'genero'=> $genero,
    'precio'=> $precio
];

$libros[$indice_libro_editar] = $libro;
?>