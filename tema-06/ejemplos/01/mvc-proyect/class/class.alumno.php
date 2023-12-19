<?php

    class classAlumno {
        public $id;
        public $nombre;
        public $apellidos;
        public $email;
        public $telefono;
        public $direccion;
        public $poblacion;
        public $provincia;
        public $nacionalidad;
        public $dni;
        public $fechaNac;
        public $id_curso;

        // Creamos un método constructor
        public function __construct($id, $nombre, $apellidos, $email, $telefono, $direccion, $poblacion, $provincia, $nacionalidad, $dni, $fechaNac, $id_curso) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->poblacion = $poblacion;
            $this->provincia = $provincia;
            $this->nacionalidad = $nacionalidad;
            $this->dni = $dni;
            $this->fechaNac = $fechaNac;
            $this->id_curso = $id_curso;
        }

    }
?>