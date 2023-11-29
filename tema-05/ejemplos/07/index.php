<?php 
Class Conexion{
    public function __construct(){
        try{
            $dsn ="mysql:host=" . SERVER . ";dbname=". BD;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".CHARSET."COLLATE". COLECTION
            ];
            $this->pdo =new PDO($dsn, USER, PASS, $options);
        } catch(PDOException $e){

        }
    }
}
?>