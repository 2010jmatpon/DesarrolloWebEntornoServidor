<?php

/* 
    class.arrayArticulos.php
    
    tabla de Artículos

    Es un array donde cada elemento es un objeto de la clase Articulo
*/

class ArrayAlumnos
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

    static public function getCursos()
    {
        $cursos = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'
        ];
        asort($cursos);
        return $cursos;

    }

    static public function getAsignaturas()
    {
        $asignaturas = [
            'Base de Datos',
            'Entonos de desarrollo',
            'FOL',
            'Lenguaje de Marcas y Sistemas de Gestión de Información',
            'Programación',
            'Sistemas Informáticos',
            'Desarrollo Web Entorno Cliente',
            'Desarrollo web Entorno Servidor',
            'Despliegue Aplicaciones Web'
        ];
        asort($asignaturas);
        return $asignaturas;

    }

    public function getDatos()
    {
        #Articulo1
        $alumno = new Alumno(
            1,
            'Juan Manuel',
            'Herrera Ramírez',
            'jmherrera@gmail.com',
            '06/03/2002',
            2,
            [6, 7, 8]
        );

        #Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Articulo2
        $alumno = new Alumno(
            1,
            'Juan Maria',
            'Mateos Ponce',
            'jmherrera@gmail.com',
            '20/10/2004',
            4,
            [6, 7, 8]
        );

        #Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Articulo3
        $alumno = new Alumno(2, 'Antonio Jesús', 'Téllez Perdigones', 'atelper@gmail.com', '10/05/1999', 2, [6, 7, 8]);

        #Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        $alumno = new Alumno( 1, 'Jorge', 'Coronil Villalba', 'jcorvil600@gmail.com', '17/04/1997', 3, [6, 7, 8], ); 
        #Añadir articulo a la tabla 
        $this->tabla[] = $alumno;

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

    public function create(Alumno $data)
    {
        $this->tabla[] = $data;
    }

    public function delete($indice)
    {
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }

    public function buscarId($indice)
    {
        return $this->tabla[$indice];
    }

    public function update(Alumno $data, $indice)
    {
        $this->tabla[$indice] = $data;
    }

}

?>