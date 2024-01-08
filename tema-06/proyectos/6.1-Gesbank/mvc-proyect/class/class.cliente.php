<?php

class ClassCliente
{

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $ciudad;
    public $dni;


    public function __construct(
        $id = null, 
        $nombre = null,
        $apellidos = null,
        $email = null,
        $telefono = null,
        $ciudad = null,
        $dni = null,

    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->dni = $dni;


    }

}

?>