<?php 
    /*
        Ejemplo 7.1
        Inicio de Sesión
    */

    session_start();

    print_r($_SESION);

    echo '<BR>';
    echo 'id:'.$_SESSION['id'];
    echo '<BR>';
    echo 'nombre:'.$_SESSION['nombre'];
    echo '<BR>';
    echo 'apellidos:'.$_SESSION['apellidos'];
?>