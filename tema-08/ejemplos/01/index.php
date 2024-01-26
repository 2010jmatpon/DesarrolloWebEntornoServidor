<?php

#apertura
$fichero = "ejemplo.txt";
$fp = fopen($fichero, 'ab');

fwrite($fp, "\n");
fwrite($fp, "Esta nueva linea");

fclose($fp);

echo "fichero creado con exito";