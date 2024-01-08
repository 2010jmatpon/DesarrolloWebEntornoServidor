<?php

class ClienteModel extends Model
{

    public function get()
    {

        try {

            $sql = "
                SELECT 
                    clientes.id,
                    clientes.nombre,
                    clientes.apellidos,
                    clientes.email,
                    clientes.telefono,
                    clientes.ciudad,
                    clientes.dni
                FROM
                    clientes
                ORDER BY 
                    clientes.id
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function create(ClassCliente $cliente)
    {

        try {
            $sql = "
                    INSERT INTO Clientes (
                        nombre,
                        apellidos,
                        email,
                        telefono,
                        ciudad,
                        dni
                    )
                    VALUES (
                        :nombre,
                        :apellidos,
                        :email,
                        :telefono,
                        :ciudad,
                        :dni
                    )
            ";
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':nombre', $cliente->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $cliente->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $cliente->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $cliente->telefono, PDO::PARAM_STR, 13);
            $pdostmt->bindParam(':ciudad', $cliente->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $cliente->dni, PDO::PARAM_STR, 9);
            
            $pdostmt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function read($id)
    {

        try {
            $sql = "
                        SELECT 
                                id,
                                nombre, 
                                apellidos,
                                email,
                                telefono,
                                ciudad,
                                dni
                        FROM 
                                clientes
                        WHERE
                                id = :id
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function update(ClassCliente $cliente, $id)
    {

        try {

            $sql = "
                
                UPDATE clientes
                SET
                        nombre = :nombre,
                        apellidos = :apellidos,
                        email = :email,
                        telefono = :telefono,
                        ciudad = :ciudad,
                        dni = :dni
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':nombre', $cliente->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $cliente->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $cliente->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $cliente->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':ciudad', $cliente->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $cliente->dni, PDO::PARAM_STR, 9);

            $pdostmt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function delete($id){
        try{          
                $sql = "
                    DELETE
                    FROM clientes
                    WHERE id = :id
                    LIMIT 1
                ";

                $conexion = $this->db->connect();

                $pdostmt = $conexion->prepare($sql);
                $pdostmt->bindParam(':id', $id , PDO::PARAM_INT);

                $pdostmt->execute();

        }catch(PDOException $e){
                include "template/partials/errordb.php";
                exit();
        }
    }


    public function order(int $criterio)
    {

        try {

            $sql = "
                SELECT 
                    clientes.id,
                    clientes.nombre,
                    clientes.apellidos,
                    clientes.email,
                    clientes.telefono,
                    clientes.ciudad,
                    clientes.dni
                FROM
                    clientes
                ORDER BY 
                    :criterio ASC
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "

                SELECT 
                    clientes.id,
                    clientes.nombre,
                    clientes.apellidos,
                    clientes.email,
                    clientes.telefono,
                    clientes.ciudad,
                    clientes.dni
                FROM
                clientes
                
                WHERE

                    CONCAT_WS(  ', ', 
                    clientes.id,
                    clientes.nombre,
                    clientes.apellidos,
                    clientes.email,
                    clientes.telefono,
                    clientes.ciudad,
                    clientes.dni) 
                    like :expresion

                ORDER BY 
                    clientes.id
                
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            
            $pdostmt->execute();
            
            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }


}

?>