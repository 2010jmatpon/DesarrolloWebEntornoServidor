<?php
session_name('actividad7_1');
session_start();

$visitas = 0;

if (isset($_SESSION['num_visitas_home'])) {
    $visitas += $_SESSION['num_visitas_home'];
}
if (isset($_SESSION['num_visitas_about'])) {
    $visitas += $_SESSION['num_visitas_about'];
}
if (isset($_SESSION['num_visitas_events'])) {
    $visitas += $_SESSION['num_visitas_events'];
}
if (isset($_SESSION['num_visitas_services'])) {
    $visitas += $_SESSION['num_visitas_services'];
}

if (!isset($_SESSION['fecha_inicio'])) {
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
            Página: Close
        </li>
        <li>
            SID:
            <?= session_id() ?>
        </li>
        <li>
            Nombre de la Sesión:
            <?= session_name() ?>
        </li>
        <li>
            Fecha y Hora del Inicio Sesión:
            <?= $_SESSION['fecha_inicio'] ?>
        </li>
        <li>
            Visitas:
            <?= $visitas ?>
        </li>

        <?php

        $fecha_cierre = date("Y-m-d H:i:s");
        $duracion = strtotime($fecha_cierre) - strtotime($_SESSION['fecha_inicio']);
        session_destroy();

        ?>
        <li>
            Fecha y Hora del Cierre Sesión: <?php echo $fecha_cierre ?>
        </li>
        <li>
            Duración de la Sesión: <?= $duracion?> segundos.
        </li>
    </ul>
</body>

</html>