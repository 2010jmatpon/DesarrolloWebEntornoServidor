<?php

/*
    Clase libros 

    Aquí se definirán los métodos necesarios para completar el examen
    
*/

class Libros extends Conexion
{
    public function getLibros()
    {
        try {


            $sql = "
            SELECT 
            libros.id,
            libros.titulo,
            autores.nombre autor,
            editoriales.nombre editorial,
            libros.stock unidades,
            libros.precio_coste coste,
            libros.precio_venta pvp
        FROM
            libros
                INNER JOIN
            autores ON libros.autor_id = autores.id
                INNER JOIN
            editoriales ON libros.editorial_id = editoriales.id
        ORDER BY id;
            ";

            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }
    }
    public function getAutores()
    {
        try {
            $sql = "
        SELECT 
        autores.id,
        autores.nombre
    FROM
        autores 
    ORDER BY autores.nombre ASC;
            ";

            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }
    }
    public function getEditoriales()
    {
        try {
            $sql = "
        SELECT 
        editoriales.id,
        editoriales.nombre
    FROM
        editoriales 
    ORDER BY editoriales.nombre ASC;
            ";

            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }
    }

    public function insertarLibro(Libro $libro)
    {
        try {
            $sql = "
                INSERT INTO libros (
                    id, 
                    isbn, 
                    ean, 
                    titulo, 
                    autor_id, 
                    editorial_id, 
                    precio_coste, 
                    precio_venta, 
                    stock, 
                    stock_min, 
                    stock_max, 
                    fecha_edicion) VALUES(
                        null,
                        :isbn,
                        null,
                        :titulo,
                        :autor_id,
                        :editorial_id,
                        :precio_coste,
                        :precio_venta,
                        :stock,
                        null,
                        null,
                        :fecha_edicion
                    )";
            $pdostmt= $this->pdo->prepare($sql);
            $pdostmt->bindParam(':isbn', $libro->isbn, PDO::PARAM_INT);
            $pdostmt->bindParam(':titulo', $libro->titulo, PDO::PARAM_STR);
            $pdostmt->bindParam(':autor_id', $libro->autor_id, PDO::PARAM_INT);
            $pdostmt->bindParam(':editorial_id', $libro->editorial_id, PDO::PARAM_INT);
            $pdostmt->bindParam(':precio_coste', $libro->precio_coste, PDO::PARAM_INT);
            $pdostmt->bindParam(':precio_venta', $libro->precio_venta, PDO::PARAM_INT);
            $pdostmt->bindParam(':stock', $libro->stock, PDO::PARAM_INT);
            $pdostmt->bindParam(':fecha_edicion', $libro->fecha_edicion);
            $pdostmt->execute();
            $pdostmt=null;
            $this->pdo =null;


        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }
    }

    public function order (int $criterio){
        try {


            $sql = "
            SELECT 
            libros.id,
            libros.titulo,
            autores.nombre autor,
            editoriales.nombre editorial,
            libros.stock unidades,
            libros.precio_coste coste,
            libros.precio_venta pvp
        FROM
            libros
                INNER JOIN
            autores ON libros.autor_id = autores.id
                INNER JOIN
            editoriales ON libros.editorial_id = editoriales.id
        ORDER BY :criterio;
            ";

            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }
    }
}

?>