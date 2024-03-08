<?php

class usersModel extends Model
{


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

    public function validaName($username)
    {
        if ((strlen($username) < 5) || (strlen($username) > 50)) {
            return false;
        }
        return true;

    }

    #Validar password
    public function validatePass($pass)
    {
        if ((strlen($pass) < 5) || (strlen($pass) > 50)) {
            return false;
        }
        return true;
    }

    #Validar email unique
    public function validateEmailUnique($email)
    {

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

    public function create($name, $email, $pass, $rol)
    {
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
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(':pass', $password_encriptado, PDO::PARAM_STR, 60);



            $stmt->execute();


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

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function getUserId($id)
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
            INNER JOIN roles as r ON ru.role_id = r.id WHERE u.id= :id
        ORDER BY u.id  LIMIT 1";
            $conexion = $this->db->connect();
            $result = $conexion->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classUser');
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();

            return $result->fetch();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }

    public function delete($id)
    {

        try {
            $delete = "
                    DELETE FROM users 
                    WHERE id = :id      
                ";

            $conexion = $this->db->connect();
            $result = $conexion->prepare($delete);

            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }
    public function update(classUser $user, $id)
    {
        try {

            $update = "
                        UPDATE users SET
                            name = :name,
                            email = :email
                        WHERE id = :id
                        LIMIT 1      
                        ";

            $conexion = $this->db->connect();
            $result = $conexion->prepare($update);

            $result->bindParam(':name', $user->name, PDO::PARAM_STR, 50);
            $result->bindParam(':email', $user->email, PDO::PARAM_STR, 50);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function updatePass(classUser $user, $id)
    {
        try {

            $password_encriptado = password_hash($user->password, CRYPT_BLOWFISH);
            $update = "
                        UPDATE users SET
                            password = :password
                        WHERE id = :id      
                        ";

            $conexion = $this->db->connect();
            $result = $conexion->prepare($update);

            $result->bindParam(':password', $password_encriptado, PDO::PARAM_STR, 50);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }
    public function order(int $criterio)
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
                ORDER BY
                    :criterio ";

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

    public function filter($expresion)
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
                    WHERE 
                        concat_ws(  ' ',
                                    u.id,
                                    u.name,
                                    u.email,
                                    u.password,
                                    r.name
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
}