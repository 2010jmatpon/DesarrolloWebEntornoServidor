<?php

$asignaturas = ArrayAlumno::getAsignaturas();
$cursos = ArrayAlumno::getCursos();
$alumnos = new ArrayAlumno();
$alumno = new Alumno();
$alumnos->getAlumnos();

$indice = $_GET['indice'];


    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $fecha = date('d/m/y', strtotime($fecha));
    $curso = $_POST['curso'];
    $asignaturasAlumn = $_POST['asignaturas'];


    $alumno->setId($id);
    $alumno->setNombre($nombre);
    $alumno->setApellidos($apellidos);
    $alumno->setEmail($email);
    $alumno->setFechaNacimiento($fecha);
    $alumno->setCurso($curso);
    $alumno->setAsignaturas($asignaturasAlumn);

    $alumnos->update($indice, $alumno );

    # Generamos una notificación
    $notificacion = 'Alumno modificado con éxito';
?>