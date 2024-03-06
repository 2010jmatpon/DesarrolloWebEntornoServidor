<?php

/*
    Modelo cuentasModel
*/


class movimientosModel extends Model
{

    # Método get
    # consulta SELECT sobre la tabla cuentas y clientes
    public function get()
    {
        try {

            $sql = " 
            SELECT 
                m.id,
                m.id_cuenta,
                m.fecha_hora,
                m.concepto,
                m.tipo,
                m.cantidad,
                m.saldo,
                c.num_cuenta as cuenta
            FROM 
                movimientos as m INNER JOIN cuentas as c
                ON m.id_cuenta = c.id 
            ORDER BY m.id;
            
            ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método create
    # Ejecuta INSERT sobre la tabla cuentas
    public function create($movimiento, $id)
    {
        try {
            $sql = " 
                    INSERT INTO 
                        movimientos (
                                    id_cuenta,
                                    fecha_hora,
                                    concepto,
                                    tipo,
                                    cantidad
                                ) VALUES ( 
                                    :id_cuenta,
                                    :fecha_hora,
                                    :concepto,
                                    :tipo,
                                    :cantidad
                                )";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            //Bindeamos parametros
            $pdoSt->bindParam(":id_cuenta", $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(":fecha_hora", $movimiento->fecha_hora);
            $pdoSt->bindParam(":concepto", $movimiento->concepto, PDO::PARAM_STR);
            $pdoSt->bindParam(":tipo", $movimiento->tipo, PDO::PARAM_INT);
            $pdoSt->bindParam(":cantidad", $movimiento->cantidad, PDO::PARAM_INT);

            $pdoSt_saldoCuenta = "
                                    UPDATE cuentas
                                        SET
                                            saldo = saldo + :cantidad,
                                            num_movtos = num_movtos + 1,
                                            fecha_ul_mov=now()
                                        WHERE
                                            id=:id";
            $pdoSt_saldoCuenta = $conexion->prepare($pdoSt_saldoCuenta);
            $pdoSt_saldoCuenta->bindParam(":cantidad", $movimiento->cantidad, PDO::PARAM_INT);
            $pdoSt_saldoCuenta->bindParam(":id", $id, PDO::PARAM_INT);


            $pdoSt_saldoMov = "
                                UPDATE movimientos
                                    SET
                                        saldo = (SELECT
                                                    saldo
                                                FROM
                                                    cuentas
                                                WHERE
                                                    id=:id)
                                    ORDER BY
                                        id
                                    DESC
                                    LIMIT
                                        1";
            $pdoSt_saldoMov = $conexion->prepare($pdoSt_saldoMov);
            $pdoSt_saldoMov->bindParam(":id", $id, PDO::PARAM_INT);

            // ejecuto
            $pdoSt->execute();
            $pdoSt_saldoCuenta->execute();
            $pdoSt_saldoMov->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getClientes
    # Realiza un SELECT sobre la tabla clientes para generar la lista select dinámica de clientes
    public function getCuentas()
    {
        try {

            $sql = " 
                SELECT 
                    id,
                    num_cuenta as cuenta
                FROM 
                    cuentas
                ORDER BY num_cuenta;
                ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
    public function getSaldo($id_cuenta)
    {
        try {
            $sql = "
                SELECT
                    id,
                    saldo 
                FROM 
                    cuentas 
                WHERE 
                    id = :id_cuenta";
            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id_cuenta", $id_cuenta, PDO::PARAM_INT);
            $pdoSt->fetch(PDO::FETCH_ASSOC);
            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getCuenta
    # Permite obtener los detalles de una cuenta a partir del id
    public function getMovimiento($id)
    {
        try {

            $sql = " 
                    SELECT 
                        m.id,
                        m.id_cuenta,
                        m.fecha_hora,
                        m.concepto,
                        m.tipo,
                        m.cantidad,
                        m.saldo
                    FROM 
                        movimientos as m 
                    WHERE
                        id=:id;";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }



    # Método order
    # Permite ordenar la tabla por cualquiera de las columnas de la tabla
    public function order(int $criterio)
    {
        try {

            $sql = " 
            SELECT 
            m.id,
            m.id_cuenta,
            m.fecha_hora,
            m.concepto,
            m.tipo,
            m.cantidad,
            m.saldo,
            c.num_cuenta as cuenta
        FROM 
            movimientos as m INNER JOIN cuentas as c
            ON m.id_cuenta = c.id 
        ORDER BY  :criterio; ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    # Método filter
    # Permite filtrar la tabla cuentas a partir de una expresión de búsqueda o filtrado
    public function filter($expresion)
    {
        try {

            $sql = "
            SELECT 
                m.id,
                m.id_cuenta,
                m.fecha_hora,
                m.concepto,
                m.tipo,
                m.cantidad,
                m.saldo,
                c.num_cuenta as cuenta
            FROM 
                movimientos as m INNER JOIN cuentas as c
                ON m.id_cuenta = c.id 
                    WHERE 
                        concat_ws(  ' ',
                        m.id_cuenta,
                        m.fecha_hora,
                        m.concepto,
                        m.tipo,
                        m.cantidad,
                        m.saldo,
                        c.num_cuenta
                                )
                    LIKE
                        :expresion ";


            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getCliente
    # Obtiene los detalles de un cliente a partir del id
    public function getCuenta($id)
    {
        try {
            $sql = " 
            SELECT 
            c.id,
            c.num_cuenta,
            c.id_cliente,
            c.fecha_alta,
            c.fecha_ul_mov,
            c.num_movtos,
            c.saldo
        FROM 
            cuentas as c 
        WHERE
            id=:id;";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function validateUniqueCuenta($num_cuenta)
    {
        try {
            // Creamos la consulta
            $sql = "SELECT * FROM cuentas  WHERE num_cuenta = :num_cuenta";

            # Conectar con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':num_cuenta', $num_cuenta, PDO::PARAM_STR);

            // Ejecutamos la sentencia
            $pdost->execute();

            if ($pdost->rowCount() != 0) {
                return false;

            }
            return true;
        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }


}
