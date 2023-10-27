<?php

$articulos = generar_tabla();
$categorias=generar_tabla_categorias();

$expresion = $_GET['expresion'];

#filtrar la tabla a partir de esa expresion
$aux = [];
foreach($articulos as $articulo){
    if(array_search($expresion ,$articulo)){
        $aux[] = $articulo;
    }
}

if(!empty($aux)){
    $articulos=$aux;
}

?>