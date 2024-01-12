<?php
    session_name('actividad7_1');
    session_start();

    if(isset($_SESSION['num_visitas_services'])){
        $_SESSION['num_visitas_services']++;
    } else{
        $_SESSION['num_visitas_services']=1;
    }

    if(!isset($_SESSION['fecha_inicio'])){
        $_SESSION['fecha_inicio'] = date("Y-m-d H:i:s");
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1</title>
</head>
<body>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="about.php">About Us</a>
        </li>
        <li>
            <a href="services.php">Servicios</a>
        </li>
        <li>
            <a href="events.php">Eventos</a>
        </li>
        <li>
            <a href="close.php">Close</a>
        </li>
    </ul>
    <hr>
    <h3>Detalles</h3>
    <ul>
        <li>
            Página: Services
        </li>
        <li>
            SID: <?=session_id()?> 
        </li>
        <li>
            Nombre de la Sesión: <?=session_name()?>
        </li>
        <li>
            Fecha y Hora del Inicio Sesión: <?=$_SESSION['fecha_inicio']?>
        </li>
        <li>
            Visitas Página Home: <?=$_SESSION['num_visitas_services']?>
        </li>
    </ul>
</body>
</html>