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
$libros = generar_tabla();

$expresion = $_GET['expresion'];

#filtrar la tabla a partir de esa expresion
$aux = [];
foreach($libros as $libro){
    if(array_search($expresion ,$libro)){
        $aux[] = $libro;
    }
}

if(!empty($aux)){
    $libros=$aux;
}

?>