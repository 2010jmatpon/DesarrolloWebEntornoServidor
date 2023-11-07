<?php

/*

    modelo: model.sumar.php

    permite operación suma

*/

#Cargo valores del folmuilario

$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];
$operacion = $_POST['operacion'];




$calcular = new Calculadora($valor1, $valor2, $operacion, null);
switch ($operacion) {
    case 'sumar':
        $calcular->sumar();
        break;
    case 'restar':
        $calcular->restar();
        break;
    case 'multiplicar':
        $calcular->multiplicar();
        break;
    case 'dividir':
        $calcular->dividir();
        break;
    case 'potencia':
        $calcular->potencia();
        break;
    default:
        echo 'Operación no válida';
        break;
}

?>