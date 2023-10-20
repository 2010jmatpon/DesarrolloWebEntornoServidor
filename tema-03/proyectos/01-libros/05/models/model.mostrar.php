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
$titulo = $_GET['titulo'];
$autor = $_GET['autor'];
$genero = $_GET['genero'];
$precio = $_GET['precio'];

#obtener el indice del libro
$indice_libro_mostrar = buscar_en_tabla($libros, 'id', $id);

#creo un array asociativo con los detalles del libro modificado
$libro = [
    'id'=> $id,
    'titulo'=> $titulo,
    'autor'=> $autor,
    'genero'=> $genero,
    'precio'=> $precio
];

$libros[$indice_libro_mostrar] = $libro;
?>