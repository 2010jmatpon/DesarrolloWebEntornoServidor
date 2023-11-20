<?php
class Fp extends Conexion
{
    /*
    getAlumnos()

    Devuelve un objeto conjunto resultados (mysqli_result)
    con los detalles de todos los alumnos
    */

    public function getAlumnos()
    {
        $sql = "SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR, alumnos.fechaNac,NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                    INNER JOIN 
                    cursos
                    ON alumnos.id_curso = cursos.id
                ORDER BY id";
        #Ejecutamos directamente SQL
        //Objeto de la clase mysqli_result
        //$result = $this->db->query($sql);

        #Mediante Plantilla SQL o Prepare
        //Objeto clase mysqli_stmt
        $stmt = $this->db->prepare($sql);

        //ejecuto
        $stmt->execute();

        //objeto clase mysqli_result
        $result = $stmt->get_result();

        return $result;
    }

    public function getCursos()
    {
        $sql = "SELECT
                    id, 
                    nombreCorto curso 
                FROM 
                    cursos 
                ORDER BY id";
                
        #Mediante Plantilla SQL o Prepare
        //Objeto clase mysqli_stmt
        $stmt = $this->db->prepare($sql);

        //ejecuto
        $stmt->execute();

        //objeto clase mysqli_result
        $result = $stmt->get_result();

        return $result;        
    }
}
?>