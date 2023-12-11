<?php

    /*
        Controlador create.php
    */

    # Cargamos configuración
    include('config/db.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.corredor.php');
    include('class/class.corredores.php');

    # Cargo modelo
    include('models/model.create.php');

    # Redirecciono controlador principal
    header('location: index.php');

?>