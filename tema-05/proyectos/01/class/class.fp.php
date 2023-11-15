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
                    timestampdiff(YEAR, alumnos.fechaNac,NOW() ) EDAD,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                    INNER JOIN 
                    cursos
                    ON alumnos.id_curso = cursos.id
                ORDER BY id";

        $result = $this->db->prepare($sql);

        return $result;
    }
}
?>