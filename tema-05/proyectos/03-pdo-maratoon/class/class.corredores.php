<?php

/*
    Clase Alumnos

    Métodos específicos para BBDD  fp con las tablas
    - Alumnos
    
*/

class Corredores extends Conexion
{

    /*

        getAlumnos()

        Devuelve un objeto conjunto resultados (PDO_result) 
        con los detalles de  todos los alumnos
 

    */
    public function getCorredores()
    {
        try {
            $sql = "

            SELECT 
    corredores.id,
    CONCAT_WS(', ',
            corredores.apellidos,
            corredores.nombre) corredor,
    corredores.ciudad,
    corredores.email,
    TIMESTAMPDIFF(YEAR,
        corredores.fechaNacimiento,
        NOW()) edad,
    categorias.nombreCorto categoria,
    clubs.nombreCorto club
FROM
    corredores
        INNER JOIN
    categorias ON corredores.id_categoria = categorias.id
        INNER JOIN
    clubs ON corredores.id_club = clubs.id
ORDER BY id
            
                ";

            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Devuelvo objeto clase pdostatement
            return $pdostmt;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }

    }

    /*

        getCursos()

        Obtengo los cursos de la tabla cursos de la bbdd fp
 

    */
    public function getClubs()
    {
        try {
            $sql = "

                    SELECT 
                        id, nombreCorto club
                    FROM
                        clubs
                    ORDER BY id
        
            ";

            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Devuelvo objeto clase pdostatement
            return $pdostmt;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }

    }
    public function getCategorias()
    {
        try {
            $sql = "

                    SELECT 
                        id, nombreCorto categoria
                    FROM
                        categorias
                    ORDER BY id
        
            ";

            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Devuelvo objeto clase pdostatement
            return $pdostmt;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }

    }
    public function insert_curso(Curso $curso)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    ) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                
                ";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
            $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_INT, 1);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

    /*
        inserta Alumno en la tabla alumnos de la bbdd fp
    */
    public function insertCorredor(Corredor $corredor)
    {

        try {
            # Prepare
            $sql = "INSERT INTO maratoon.corredores (
                nombre,
                apellidos,
                ciudad,
                fechaNacimiento,
                sexo,
                email,
                dni,
                id_categoria,
                id_club
            ) VALUES(
                :nombre,
                :apellidos,
                :ciudad,
                :fechaNacimiento,
                :sexo,
                :email,
                :dni,
                :id_categoria,
                :id_club)";

            # Objeto clase mysqli_stmt
            $pdostmt = $this->pdo->prepare($sql);

            # Vinculo parámetros con variables
            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNac);
            $pdostmt->bindParam(':sexo', $corredor->sexo, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            // $pdostmt->bindParam(':edad', $corredor->edad, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);

            # Ejecuto mysqli_stmt e inserto registro
            $pdostmt->execute();

            # Libero memoria
            $pdostmt = null;

            # Cerrar conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

    /*
        read_alumno($id)
        Devuelve un objeto conjunto resultados con los datos de un alumno.
        Se pásara el id como parametro
    */
    public function read_corredor($id)
    {
        try {
            $sql = "SELECT * FROM corredores WHERE id = :id";

            // Mediante Prepare
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos parametros
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Elegimos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos
            $pdostmt->execute();

            // Devolvemos el registro
            return $pdostmt->fetch();

        } catch (PDOException $e) {
            include '../views/partials/errorDB.php';
            exit();
        }

    }

    /*
       updateAlumno(Alumno $alumno,$indice)
   */
    public function update_corredor(Corredor $corredor, $id)
    {
        try {

            // Consulta SQL
            $sql = "
                UPDATE corredores SET 
                    nombre = :nombre, 
                    apellidos = :apellidos,
                    ciudad = :ciudad, 
                    fechaNacimiento = :fechaNacimiento, 
                    sexo = :sexo, 
                    email = :email, 
                    dni = :dni, 
                    id_categoria = :id_categoria, 
                    id_club = :id_club
                WHERE 
                    id = :id
                LIMIT 1
            ";

            // Prepare-> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            // Vincular los parámetros
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNac);
            $pdostmt->bindParam(':sexo', $corredor->sexo, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            // $pdostmt->bindParam(':edad', $corredor->edad, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);

            // Ejecutamos la sentencia preparada
            $pdostmt->execute();

            // Libero memoria
            $pdostmt = null;

            // Cerramos conexión
            $this->pdo = null;

        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    /*
        get_curso($id)

        devuelve el nombre del curso asociado a su id
    */
    public function get_categoria($id)
    {
        try {

            $sql = "

                SELECT 
                    id, 
                    nombreCorto curso
                FROM
                    categorias
                wHERE id = :id
                LIMIT 1

                ";

            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vinculo los parámetros
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Sólo tengo 1 resultado y de ese resultado me interesa curso
            return $pdostmt->fetch()->curso;

        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }
    public function get_club($id)
    {
        try {

            $sql = "

                SELECT 
                    id, 
                    nombreCorto curso
                FROM
                    clubs
                wHERE id = :id
                LIMIT 1

                ";

            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vinculo los parámetros
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Sólo tengo 1 resultado y de ese resultado me interesa curso
            return $pdostmt->fetch()->curso;

        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    /*

        order($criterio)

        

        Devuelve un objeto pdostatement
        con los detalles de  todos los alumnos

        Tenemos que forzar que criterio sea valor entero, vamos a usar como criterio
        de ordenación el número de la columna desde 2 hasta 8, donde 2 es por alumno,
        y 8 es por curso.
 

    */
    public function order(int $criterio)
    {
        try {
            $sql = "

            SELECT 
    corredores.id,
    CONCAT_WS(', ',
            corredores.apellidos,
            corredores.nombre) corredor,
    corredores.ciudad,
    corredores.email,
    TIMESTAMPDIFF(YEAR,
        corredores.fechaNacimiento,
        NOW()) edad,
    categorias.nombreCorto categoria,
    clubs.nombreCorto club
FROM
    corredores
        INNER JOIN
    categorias ON corredores.id_categoria = categorias.id
        INNER JOIN
    clubs ON corredores.id_club = clubs.id
ORDER BY :order ASC
            
            ";

            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Enlazamos parámetro con variable
            $pdostmt->bindParam(':order', $criterio, PDO::PARAM_INT);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Devuelvo objeto clase pdostatement
            return $pdostmt;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }

    }

    /*

        filter($expresion)

        Devuelve un objeto clase pdostatement con los detalles
        filtrados de alumnos

        
 

    */
    public function filter($expresion)
    {
        try {
            $sql = "SELECT 
            corredores.id,
            CONCAT_WS(', ',corredores.apellidos, corredores.nombre) as corredor,
            corredores.ciudad,
            corredores.email,
            TIMESTAMPDIFF(YEAR,
                corredores.fechaNacimiento,
                NOW()) AS edad,
            categorias.nombrecorto AS categorias,
            clubs.nombreCorto AS club
        FROM
            maratoon.corredores
                INNER JOIN
            maratoon.categorias ON categorias.id = corredores.id_categoria
                INNER JOIN
            maratoon.clubs ON clubs.id = corredores.id_club
        WHERE
        CONCAT_WS('',corredores.apellidos, 
                    corredores.nombre,
                    corredores.ciudad,
                    corredores.email,
                    TIMESTAMPDIFF(YEAR,corredores.fechaNacimiento,NOW()),
                    categorias.nombrecorto,
                    clubs.nombreCorto) 
        LIKE :expresion";
            $expresion = '%' . $expresion . '%';
            # Prepare -> objeto clase pdostatement
            $pdostmt = $this->pdo->prepare($sql);

            # Enlazamos parámetro con variable

            $pdostmt->bindParam(':expresion', $expresion, PDO::PARAM_STR);

            # Establezco tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecuto
            $pdostmt->execute();

            # Devuelvo objeto clase pdostatement
            return $pdostmt;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }

    }

    public function delete_corredor($id)
    {
        try {

            $sql = "DELETE FROM corredores WHERE id = :id";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            # ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

}

?>