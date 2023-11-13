<?php

/*
    Clase articulo
*/

class Alumno
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $fecha_nacimiento;
    private $curso;
    private $asignatura;

    public function __construct($id = null, $nombre = null, $apellidos = null, $email = null, $fecha_nacimiento = null, $curso = null, $asignaturas = null)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->curso = $curso;
        $this->asignatura = $asignaturas;

    }

    public function getEdad(){
       $fechaNacimiento = new DateTime($this->fecha_nacimiento);
       $hoy = new DateTime();
       $edad = $hoy->diff($fechaNacimiento)->y;
       return $edad; 
    }


}



?>