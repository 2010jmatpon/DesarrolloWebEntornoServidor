<?php

# Creo el objeto de la clase arrayUsuarios
$jugadores = new tablaJugadores();

# Obtengo arrays de paises, posiciones y equipos
$paises = tablaJugadores::getPaises();
$posiciones = tablaJugadores::getPosiciones();
$equipos = tablaJugadores::getEquipos();

# Cargo los datos
$jugadores->getDatos();

# Obtengo la tabla de usuarios mediante método getArray()
$t_jugadores = $jugadores->getTabla();

$indice = $_GET['key'];

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$paisJugador = $_POST['pais'];
$equipoJugador = $_POST['equipo'];
$posJugador = $_POST['posiciones'];
$contrato = $_POST['contrato'];

$jugador = $jugadores->read($indice);

?>