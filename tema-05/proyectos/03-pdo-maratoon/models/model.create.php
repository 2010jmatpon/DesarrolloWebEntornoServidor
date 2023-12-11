<?php

/*

    Modelo: model.create.php
    Descripcion: añade un nuevo  alumno a la tabla alumnos de la bbdd fp

    Método POST:
                
                - nombre
                - apellidos
                - email
                - telefono
                - direccion
                - poblacion
                - provincia
                - nacionalidad
                - dni
                - fechaNac
                - id_curso

*/

# Cargamos en varibales detalles del  formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$ciudad = $_POST['ciudad'];
$fechaNac = $_POST['fechaNac'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$dni = $_POST['dni'];
// $edad = $_POST['edad'];
$id_categoria = $_POST['id_categoria'];
$id_club = $_POST['id_club'];

# Creamos un  objeto null de la clase Alumno
$corredor = new Corredor();

# Asignamos valores a las propiedades
$corredor->id = null;
$corredor->nombre = $nombre;
$corredor->apellidos = $apellidos;
$corredor->ciudad = $ciudad;
$corredor->fechaNac = $fechaNac;
$corredor->sexo = $sexo;
$corredor->email = $email;
$corredor->dni = $dni;
// $corredor->edad = $edad;
$corredor->id_categoria = $id_categoria;
$corredor->id_club = $id_club;

# Validación

# Insertar registro
$conexion = new Corredores();
$conexion->insertCorredor($corredor);

header('location: index.php');

?>