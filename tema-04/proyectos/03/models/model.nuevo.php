<?php

    /*

        Modelo: model.nuevo.php
        Descripcion: carga array categorias generar el select dinámico de categorías

    */

    # cargamos la tabla
    $asignaturas = ArrayAlumno::getAsignaturas();
    $cursos = ArrayAlumno::getCursos();

    #Creamos un objeto de la clase ArrayArticulos
    $alumnos = new ArrayAlumno();
    $alumnos -> getAlumnos();


?>