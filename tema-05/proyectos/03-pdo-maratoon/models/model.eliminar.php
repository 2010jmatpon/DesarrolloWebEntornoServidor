<?php

    $id_eliminar = $_GET['id'];

    $conexion = new Corredores();

    $conexion->delete_corredor($id_eliminar);

?>