<?php

/*  
    Class Vehiculo
*/

class Vehiculo
{
    private $modelo;
    private $nombre;
    private $velocidad;
    private $matricula;

    public function __construct($modelo = null, $nombre = null, $matricula = null, $velocidad = null)
    {
        $this->modelo = $modelo;
        $this->nombre = $nombre;
        $this->matricula = $matricula;
        $this->velocidad = $velocidad;
    }


    #Setters
//Modificar los valores de los atributos de un objeto.
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }


    #Getters
// Obtener los valores asignados a los atributos de un objeto.
    public function getModelo()
    {
        return $this->modelo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    // public function setVelocidad($velocidad){

    // }
    // public function aumentarVelocidad(){
    //     $this.velocidad += 10;
    // }
}
?>