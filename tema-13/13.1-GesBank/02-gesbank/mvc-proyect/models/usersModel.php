<?php

class usersModel extends Model
{

    # Método get
    # consulta SELECT sobre la tabla cuentas y clientes
    public function get()
    {
        try {

            $sql = " 
            SELECT 
                u.id,
                u.name,
                u.email,
                u.password,
                r.name as rol
            FROM 
                roles_users as ru INNER JOIN users as u
                ON ru.user_id = u.id
                INNER JOIN roles as r ON ru.role_id = r.id
            ORDER BY u.id;
            
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
    public function getRoles()
    {
        try {

            $sql = " 
                SELECT 
                    id,
                    name as rol
                FROM 
                    roles
                ORDER BY id;
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

    public function validaName($username) {
        if ((strlen($username) < 5) || (strlen($username) > 50)) {
            return false;
        }
        return true;
    
    }

    #Validar password
    public function validatePass($pass) {
        if ((strlen($pass) < 5) || (strlen($pass) > 50)) {
            return false;
        }
        return true;
    }

    #Validar email unique
    public function validateEmailUnique($email) {

        try {
            
            $selectSQL = "SELECT * FROM users WHERE email = :email";
            $pdo = $this->db->connect();
            $resultado = $pdo->prepare($selectSQL);
            $resultado->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $resultado->execute();
            if ($resultado->rowCount() > 0)
                return false;
            else 
                return true;
        } catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    
        
    }

    # Creo nuevo usuario a partir de los datos de formulario de registro
    public function create ($name, $email, $pass, $rol) {
        try {
            
            $password_encriptado = password_hash($pass, CRYPT_BLOWFISH);
           
            $insertarsql = "INSERT INTO users VALUES (
                 null,
                :nombre,
                :email,
                :pass,
                default,
                default)";

            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($insertarsql);

            $stmt->bindParam(':nombre', $name, PDO::PARAM_STR, 50);
            $stmt->bindParam(':email', $email , PDO::PARAM_STR, 50);
            $stmt->bindParam(':pass', $password_encriptado, PDO::PARAM_STR, 60) ;


            
            $stmt->execute();

            

            # Asignamos rol de registrado
            // Rol que asignaremos por defecto

            $insertarsql = "INSERT INTO roles_users VALUES (
                null,
                :user_id,
                :role_id,
                default,
                default)";
            
            # Obtener id del último usuario insertado
            $ultimo_id = $pdo->lastInsertId();

            $stmt = $pdo->prepare($insertarsql);
            $stmt->bindParam(':user_id', $ultimo_id);
            $stmt->bindParam(':role_id', $rol);
            $stmt->execute();

        }  catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function getUserId($id) {
        try {

            $sql = "SELECT * FROM users WHERE id= :id LIMIT 1";
            $conexion = $this->db->connect();
            $result = $conexion->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'classUser');
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            
            return $result->fetch();

        }  catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }

    }

    public function delete($id) {

        try {
                $delete = "
                    DELETE FROM users 
                    WHERE id = :id      
                ";

                $conexion = $this->db->connect();
                $result = $conexion->prepare($delete);

                $result->bindParam(':id', $id, PDO::PARAM_INT) ;

                $result->execute();

        }  catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }
}