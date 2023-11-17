<?php

$asignaturas = ArrayAlumno::getAsignaturas();
$cursos = ArrayAlumno::getCursos();
$alumnos = new ArrayAlumno();
$alumnos->getAlumnos();

$id = $_GET['indice'];

$alumno = $alumnos->buscarId($id);

?>