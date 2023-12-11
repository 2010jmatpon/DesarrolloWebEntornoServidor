<?php
    /*
        Modelo: model.editar.php
        Descripción: editar los detalles de un alumno

        Método GET:
            - id del alumno que quiero editar
    */

    // Captamos en una variable el id enviado a tráves del método GET
    $id = $_GET['id'];

    // Creamos una conexion
    $conexion = new Corredores();

    // Cargamos los cursos
    $categorias = $conexion->getCategorias();
    $clubs = $conexion->getClubs();

    // Cargamos el alumno seleccionado
    $corredor = $conexion->read_corredor($id);


?>