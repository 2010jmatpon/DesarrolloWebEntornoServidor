<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 4.3 - Gestión de Alumnos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Formulario Nuevo Alumno</legend>

        <!-- Formulario Nuevo Alumno -->
        <form action="create.php" method="POST">

            <!-- id -->
            <div class="mb-3">
                <label for="number" class="form-label">Id</label>
                <input type="text" class="form-control" name="id">
            </div> 
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha Nacimiento:</label>
                <input type="text" class="form-control" name="fecha">
            </div>
            <!-- Curso Select -->
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <option selected disabled>Seleccione Curso</option>
                    <?php foreach ($cursos as $indice => $curso): ?>
                        <option value="<?= $indice ?>">
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Asignaturas -->
            <div class="mb-3">
                <label for="asignaturas" class="form-label">Seleccione Asignaturas</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $indice => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]">
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>



            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>