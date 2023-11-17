<?php

    /*

        Modelo: model.create.php
        Descripcion: añade un nuevo  artículo en a la tabla

        Método POST:
                    - descripcion
                    - modelo
                    - genero
                    - unidades
                    - precio

    */
  #Creamos un objeto de la clase ArrayArticulos
    $alumnos = new ArrayAlumno();
    $alumnos -> getAlumnos();

    # cargamos la tabla
    $asignaturas = ArrayAlumno::getAsignaturas();
    $cursos = ArrayAlumno::getCursos();

  

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $cursosAlumn = $_POST['curso'];
    $asignaturasAlumn = $_POST['asignaturas'];
    

    $alumno = new Alumno(
        $id,
        $nombre,
        $apellidos,
        $email,
        $fecha,
        $cursosAlumn,
        $asignaturasAlumn
        
    );


    $alumnos -> create($alumno);

    $notificacion = "Alumno añadido con éxito";

?>