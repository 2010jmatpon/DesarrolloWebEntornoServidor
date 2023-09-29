<!DOCTYPE html>
<html>
<head>
    <title>Actividad 2.1 - Ejercicio 6</title>
</head>
<body>
    <?php
    $nombre = "Juan María";
    $apellidos = "Mateos";
    $poblacion = "Ubrique";
    $edad = 18;
    $ciclo = "DAW";
    $curso = 2;
    $modulo = "Desarrollo Web Entorno Servidor";

    
    echo "<h1>Actividad 2.1 - Ejercicio 6 - Juan María</h1>";

    echo "<table border='3' width = '50%' >";

    echo "<tr><td>Nombre</td><td>$nombre</td></tr>";

    echo "<tr><td>Apellidos</td><td>$apellidos</td></tr>";

    echo "<tr><td>Población</td><td>$poblacion</td></tr>";

    echo "<tr><td>Edad</td><td>$edad</td></tr>";

    echo "<tr><td>Ciclo</td><td>$ciclo</td></tr>";

    echo "<tr><td>Curso</td><td>$curso</td></tr>";

    echo "<tr><td>Módulo</td><td>$modulo</td></tr>";

    echo "</table>";

    echo "<h2>Resumen</h2>";
    echo "<p>Hola, soy  $nombre $apellidos, tengo $edad años, y soy de $poblacion, estoy haciendo $curso $ciclo y realizando las actividades de $modulo.</p>";
    ?>
</body>
</html>