<?php

/*

    Modelo: model.eliminar.php
    Descripcion: elimina un elemento de la  tabla

    Método GET:
                - id del artículo que quiero eliminar

*/

# cargamos la tabla
$asignaturas= ArrayAlumno::getAsignaturas();
$cursos = ArrayAlumno::getCursos();

#Creamos un objeto de la clase ArrayArticulos
$alumnos = new ArrayAlumno();
$alumnos->getAlumnos();


# obtengo el  id del  artículo que deseo eliminar
$id = $_GET['indice'];




if ($id !== false) {
    // elimino elemento seleccionado 
    $alumnos->delete($id);

    # Generamos notificación
    $notificacion = "Alumno eliminado con éxito";

} else {
    echo 'ERROR: libro no encontrado';
    exit();
}




?>