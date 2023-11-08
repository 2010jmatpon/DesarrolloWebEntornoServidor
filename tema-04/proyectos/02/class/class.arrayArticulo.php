<?php

    /* 
        class.arrayArticulos.php
        
        tabla de Artículos

        Es un array donde cada elemento es un objeto de la clase Articulo
    */

    class ArrayArticulos {
        private $tabla;

        public function __construct($tabla) {
        
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

        public function getCategorias(){
            
        }
    }

?>