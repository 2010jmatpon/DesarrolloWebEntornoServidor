<?php

/* 
        Modelo: model.mostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del alumno
*/

# extraemos id alumno
$id = $_GET['id'];

# Creamos una conexion
$conexion = new Corredores();

# Cargamos los cursos
$categorias = $conexion->getCategorias();
$clubs = $conexion->getClubs();

# Extraemos objeto con los detalles  del alumno
$corredor = $conexion->read_corredor($id);

# Extraemos nombre del  curso  al  que pertenece el alumno
$categoria = $conexion->get_categoria($corredor->id_categoria);
$club = $conexion->get_club($corredor->id_club);



?>