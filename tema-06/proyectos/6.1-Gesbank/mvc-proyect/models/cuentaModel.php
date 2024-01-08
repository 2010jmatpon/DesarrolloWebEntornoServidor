<?php

class CuentaModel extends Model
{

    public function get()
    {

        try {

            $sql = "
                SELECT 
                    cuentas.id,
                    cuentas.num_cuenta, 
                    clientes.nombre nombre,
                    clientes.apellidos apellidos,
                    cuentas.fecha_alta,
                    cuentas.fecha_ul_mov,
                    cuentas.num_movtos,
                    cuentas.saldo
                FROM
                    cuentas
                INNER JOIN
                    clientes
                ON 
                    cuentas.id_cliente = clientes.id
                ORDER BY 
                    id
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

    public function getClientes()
    {

        try {

            $sql = "
                
                    SELECT 
                            clientes.id,
                            concat_ws(', ', clientes.apellidos, clientes.nombre) cliente
                            
                    FROM 
                            clientes
                    ORDER BY 
                            nombre

                ";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);

            $result->setFetchMode(PDO::FETCH_OBJ);

            $result->execute();

            return $result;


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }


    }

    public function create(ClassCuenta $cuenta)
    {

        try {

            $sql = "
                    INSERT INTO Cuentas (
                        num_cuenta,
                        id_cliente,
                        fecha_alta,
                        fecha_ul_mov,
                        num_movtos,
                        saldo
                    )
                    VALUES (
                        :num_cuenta,
                        :id_cliente,
                        :fecha_alta,
                        :fecha_ul_mov,
                        :num_movtos,
                        :saldo
                    )
            ";
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_INT, 18);
            $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos, PDO::PARAM_INT, 3);
            $pdostmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_INT, 9);

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
                                num_cuenta, 
                                id_cliente,
                                fecha_alta,
                                fecha_ul_mov,
                                num_movtos,
                                saldo
                        FROM 
                                cuentas
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

    public function update(ClassCuenta $cuenta, $id)
    {

        try {

            $sql = "
                
                UPDATE cuentas
                SET
                        num_cuenta = :num_cuenta,
                        id_cliente = :id_cliente,
                        fecha_alta = :fecha_alta,
                        fecha_ul_mov = :fecha_ul_mov,
                        num_movtos = :num_movtos,
                        saldo = :saldo
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_INT, 18);
            $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos, PDO::PARAM_INT, 3);
            $pdostmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_INT, 9);

            $pdostmt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function delete($id)
    {
        try {
            $sql = "
                    DELETE
                    FROM cuentas
                    WHERE id = :id
                    LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->execute();

        } catch (PDOException $e) {
            include "template/partials/errordb.php";
            exit();
        }
    }

    public function order(int $criterio)
    {

        try {

            $sql = "
                SELECT 
                    cuentas.id,
                    clientes.nombre,
                    clientes.apellidos,
                    cuentas.num_cuenta,
                    cuentas.fecha_alta,
                    cuentas.fecha_ul_mov,
                    cuentas.num_movtos,
                    cuentas.saldo
                FROM
                    cuentas
                INNER JOIN
                    clientes
                ON 
                    cuentas.id_cliente = clientes.id
                ORDER BY 
                    :criterio
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
                cuentas.id,
                clientes.nombre,
                clientes.apellidos,
                cuentas.num_cuenta,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
                FROM
                    cuentas
                INNER JOIN
                    clientes
                ON 
                    cuentas.id_cliente = clientes.id
                WHERE

                    CONCAT_WS(  ', ', 
                    cuentas.id,
                    clientes.nombre,
                    clientes.apellidos,
                    cuentas.num_cuenta,
                    cuentas.fecha_alta,
                    cuentas.fecha_ul_mov,
                    cuentas.num_movtos,
                    cuentas.saldo) 
                    like :expresion

                ORDER BY 
                    cuentas.id
                
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