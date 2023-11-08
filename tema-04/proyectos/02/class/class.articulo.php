<?php

/*
    Clase articulo
*/

class Articulo
{
    private $id;
    private $modelo;
    private $marca;
    private $descripcion;
    private $categorias;
    private $unidades;
    private $precio;

    public function __construct($id = null, $modelo = null, $marca = null, $descripcion = null, $categorias = null, $unidades = null, $precio = null)
    {

        $this->id = $id;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->descripcion = $descripcion;
        $this->categorias = $categorias;
        $this->unidades = $unidades;
        $this->precio = $precio;

    }
}



?>