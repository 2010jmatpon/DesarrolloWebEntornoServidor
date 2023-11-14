<?php

$servidor = 'localhost';
$user = 'root';
$password = '';
$bd = 'fp';

#Conexión
$conexion = new mysqli($servidor, $user, $password, $bd);

if ($conexion->connect_errno) {
    echo'Error de conexión Nº '.$conexion->connect_errno;
    echo '<br>';
    echo'Error en la conexion'.$conexion->connect_error;
    exit();
}

echo'Conexión establecida con éxito';

#Creamos variable para la ejecucion del comando sql
$sql ='select * from alumnos order by id';

#Con el método query devolvemos un objeto de la clase resul
$result = $conexion->query($sql);

echo'<br>';
echo'Número de registros: '. $result->num_rows;
echo'<br>';
echo'Número de columnas: '. $result->field_count;
echo '<br>';

$alumnos = $result->fetch_all(MYSQLI_NUM);

$alumnos = $alumnos[0];

var_dump($alumnos);


?>