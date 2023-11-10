<?php

/* 
    class.arrayArticulos.php
    
    tabla de Artículos

    Es un array donde cada elemento es un objeto de la clase Articulo
*/

class ArrayArticulos
{
    private $tabla;

    public function __construct()
    {

        $this->tabla = [];

    }


    /**
     * Get the value of tabla
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     *
     * @return  self
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    static public function getMarcas()
    {
        $marcas = [
            'Xiaomi',
            'Acer',
            'Aoc',
            'Nokia',
            'Apple',
            'Lenovo',
            'IBM'
        ];
        asort($marcas);
        return $marcas;

    }

    static public function getCategorias()
    {
        $categorias = [
            'Portátil',
            'PC sobremesa',
            'Componente',
            'Pantalla',
            'Impresora',
            'Tablets',
            'Móviles',
            'Fotografía',
            'Imagen'
        ];
        asort($categorias);
        return $categorias;

    }

    public function getDatos()
    {
        #Articulo1
        $articulo = new Articulo(
            1,
            'Portátil - HP 15-DB0074NS',
            'HP 15-DB0074NS',
            0,
            [1, 2, 3],
            120,
            379
        );

        #Añadir artículo a la tabla
        $this->tabla[] = $articulo;

        #Articulo2
        $articulo = new Articulo(
            2,
            'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
            'HP 255 G7, 15.6',
            0,
            [2, 3, 5],
            200,
            20.5
        );

        #Añadir artículo a la tabla
        $this->tabla[] = $articulo;

        #Articulo3
        $articulo = new Articulo(
            3,
            'PC sobremesa - Lenovo Intel® Core™ i3-8100',
            'ideacentre 510S-07|CB',
            1,
            [2, 3],
            50,
            12.95
        );

        #Añadir artículo a la tabla
        $this->tabla[] = $articulo;

    }

    static public function mostrarCategorias($categorias, $categoriasArticulo)
    {
        //Podemos declarar este metodo estático porque no modifica ningun atributo de la clase
        $arrayCategorias = [];

        foreach ($categoriasArticulo as $indice) {

            $arrayCategorias[] = $categorias[$indice];

        }

        asort($arrayCategorias);
        return $arrayCategorias;

    }

    public function create(Articulo $data)
    {
        $this->tabla[] = $data;
    }

    public function delete($indice)
    {
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }

    function buscar_en_tabla($tabla = [], $columna, $valor)
    {

        $columna_valores = array_column($tabla, $columna);
        return array_search($valor, $columna_valores, false);

    }

}

?>