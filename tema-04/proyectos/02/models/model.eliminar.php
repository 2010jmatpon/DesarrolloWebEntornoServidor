<?php

/*

    Modelo: model.eliminar.php
    Descripcion: elimina un elemento de la  tabla

    Método GET:
                - id del artículo que quiero eliminar

*/

# cargamos la tabla
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

#Creamos un objeto de la clase ArrayArticulos
$articulos = new ArrayArticulos();
$articulos->getDatos();


# obtengo el  id del  artículo que deseo eliminar
$id = $_GET['indice'];




$articulos->delete($id);
$notificacion = "Articulo eliminado con éxito";




?>