<?php

/*
    alumnoModel.php

    Modelo del  controlador alumnos

    Definir los métodos de acceso a la base de datos
    
    - insert
    - update
    - select
    - delete
    - etc..
*/

class albumModel extends Model
{

    /*
        Extrae los detalles  de los alumnos
    */
    public function get()
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    *
                FROM
                    albumes
                ORDER BY 
                    id
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function getAlbum($id)
    {
        try {
            $sql = " 
                    SELECT     
                        *
                    FROM  
                        albumes  
                    WHERE
                        id = :id";

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


    public function create(classAlbum $album)
    {

        try {
            $sql = "
                    INSERT INTO albumes (
                        titulo,
                        descripcion,
                        autor,
                        fecha,
                        lugar,
                        categoria,
                        etiquetas,
                        num_fotos,
                        num_visitas,
                        carpeta
                    )
                    VALUES (
                        :titulo,
                        :descripcion,
                        :autor, 
                        :fecha,
                        :lugar,
                        :categoria,
                        :etiquetas,
                        null,
                        null,
                        :carpeta
                    )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR);
            $pdoSt->bindParam(':fecha', $album->fecha);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

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
                                *
                        FROM 
                                albumes
                        WHERE
                                id = :id
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function update(classAlbum $album, $id)
    {

        try {

            $sql = "
                
                UPDATE albumes
                SET
                    titulo = :titulo,
                    descripcion = :descripcion,
                    autor = :autor, 
                    fecha = :fecha,
                    lugar = :lugar,
                    categoria = :categoria,
                    etiquetas = :etiquetas,
                    carpeta = :carpeta
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR);
            $pdoSt->bindParam(':fecha', $album->fecha);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    /*
       Extrae los detalles  de los alumnos
   */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "SELECT 
                albumes.id,
                albumes.titulo,
                albumes.lugar,
                albumes.fecha,
                albumes.categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta

        FROM albumes

        ORDER BY :criterio ASC";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

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
                albumes.id,
                albumes.titulo,
                albumes.lugar,
                albumes.fecha,
                albumes.categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta

            FROM albumes

            WHERE 
                CONCAT_WS(
                        albumes.id,
                        albumes.titulo,
                        albumes.lugar,
                        albumes.fecha,
                        albumes.categoria,
                        albumes.etiquetas,
                        albumes.num_fotos,
                        albumes.num_visitas,
                        albumes.carpeta
                        )
                LIKE :expresion
            ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }

    

    public function delete($id)
    {
        try {

            $sql = "DELETE FROM albumes WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    
    public function uploadFoto($archivo, $carpeta){

        // Comprobamos si ha ocurrido algún error de archivo
        $phpFileUploadErrors = array(
            UPLOAD_ERR_OK => 'No hay error, el archivo se subió con éxito',
            UPLOAD_ERR_INI_SIZE => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
            UPLOAD_ERR_FORM_SIZE => 'El archivo subido excede el MAX_FILE_SIZE especificado en el formulario HTML',
            UPLOAD_ERR_PARTIAL => 'El archivo subido solo se cargó parcialmente',
            UPLOAD_ERR_NO_FILE => 'No se subió ningún archivo',
            UPLOAD_ERR_NO_TMP_DIR => 'Falta la carpeta temporal',
            UPLOAD_ERR_CANT_WRITE => 'Error al escribir el archivo en el disco.',
            UPLOAD_ERR_EXTENSION => 'Una extensión de PHP detuvo la carga del archivo.',
        );
    
        // Verificamos si hubo un error durante la carga del archivo
        if($archivo['error'] != UPLOAD_ERR_OK){
            $error = $phpFileUploadErrors[$archivo['error']];
            $_SESSION['error'] = $error;
            return;
        }
    
        // Validar tamaño máximo 4MB
        $max_file_size = 4 * 1024 * 1024; // 4MB en bytes
        if($archivo['size'] > $max_file_size){
            $_SESSION['error'] = "El archivo excede el tamaño máximo permitido (4MB)";
            return;
        }
    
        // Validar tipo de archivo
        $allowed_extensions = array('jpeg', 'jpg', 'gif', 'png');
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        if(!in_array($extension, $allowed_extensions)){
            $_SESSION['error'] = "Tipo de archivo no permitido. Solo se permiten archivos JPEG, JPG, GIF o PNG.";
            return;
        }
    
        // Movemos el archivo a la carpeta de destino
        if(is_uploaded_file($archivo['tmp_name'])){
            $destino = "images/{$carpeta}/" . $archivo['name'];
            if(move_uploaded_file($archivo['tmp_name'], $destino)){
                $_SESSION['mensaje'] = "Archivo subido con éxito";
            }else{
                $_SESSION['error'] = "Hubo un error al mover el archivo a la carpeta de destino";
            }
        }else{
            $_SESSION['error'] = "Error al subir el archivo";
        }
    }
    

}

?>