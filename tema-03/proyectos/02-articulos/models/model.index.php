<?php
/*
Modelo: model.index.php
Descripcion: Genera los datos de los articulo
*/
setlocale(LC_MONETARY,"es_ES");
$categorias = generar_tabla_categorias();
$articulos = generar_tabla();



?>