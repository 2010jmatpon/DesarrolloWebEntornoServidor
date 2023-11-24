<?php 
Class Conexion{
    public function __construct(){
        try{
            $dsn ="mysql:host=" . SERVER . ";dbname=". BD;
        } catch()
    }
}
?>