<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "views/layouts/head.html" ?>

</head>

<body>
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php" ?>

        <legend>Alumno seleccionado</legend>
        <form>

            <form action="mostrar.php">

                <div class="mb-3">
                    <label for="id" class="form-label">Id: </label>
                    <input type="text" class="form-control" name="id" value="<?= $alumno->getId() ?>" disabled>

                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="nombre" value="<?= $alumno->getNombre() ?>"
                        disabled>

                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos: </label>
                    <input type="text" class="form-control" name="apellidos" value="<?= $alumno->getApellidos() ?>" disabled>

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" class="form-control" name="email" value="<?= $alumno->getEmail() ?>" disabled>

                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad: </label>
                    <input type="text" class="form-control" name="edad" value="<?= $alumno->getEdad() ?>" disabled>

                </div>

                <!-- Falta poner que no muestre los números sino los nombres. -->
                <!-- MARCAS -->
                <div class="mb-3">
                    <label for="curso" class="form-label">Curso: </label>
                    <input type="text" class="form-control" name="curso" value="<?= $alumno->getCurso() ?>"
                        disabled>

                </div>

                <!-- CATEGORIAS -->
                <div class="mb-3">
                    <label for="asignaturas" class="form-label">Asignaturas: </label>
                    <input type="text" class="form-control" name="asignaturas"
                        value="<?= implode(", ", ArrayAlumno::mostrarAsignatura($asignaturas, $alumno->getAsignaturas())) ?>" disabled>

                </div>


                <!-- Botones de acción -->

                <div class="btn-group" role="group">

                    <a class="btn btn-primary" href="index.php" role="button">Volver</a>

                </div>
                <br>
                <br>
                <br>


            </form>
    </div>
    <?php
    include 'views/partials/footer.html';
    ?>
    <!-- javascript bootstrap 512 -->
    <?php
    include "views/layouts/javascript.html";
    ?>
</body>

</html>