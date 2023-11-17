<!DOCTYPE html>
<html lang="es">

<head>

    <?php include "views/layouts/head.html" ?>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php" ?>

        <legend>Formulario Nuevo Alumno</legend>

        <form action="update.php?id=<?= $id ?>" method="POST">

        <div class="form-floating mb-3">
                
                <input type="number" class="form-control" name="id" value="<?=$alumno->getId()?>" readonly>
                <label class="form-label">id</label>
            </div>
            
            <!-- descripción -->
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" name="nombre" value="<?=$alumno->getNombre()?>">
                <label class="form-label">Nombre</label>
            </div>

            <!-- Modelo -->
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" name="apellidos" value="<?=$alumno->getApellidos()?>">
                <label class="form-label">Apellidos</label>
            </div>
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" name="email" value="<?=$alumno->getEmail()?>">
                <label class="form-label">Email</label>
            </div>
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" name="fecha" value="<?=$alumno->getFechaNacimiento()?>">
                <label class="form-label">Fecha Nacimiento</label>
            </div>

            <!-- Marca -->
            <div class="form-floating mb-3">
                
                <select class="form-select" aria-label="Default select example" name="curso">
                    <?php foreach($cursos as $key => $curso): ?>
                        <option value="<?=$key?>"
                        <?=($alumno->getCurso() == $key)?'selected':null ?>>
                        <?=$curso?></option>
                    <?php endforeach; ?>
                </select>
                <label class="form-label">Curso</label>
            </div>
            <!-- Categorías -->
            <div class="mb-3">
                <label class="form-floating mb-3">Seleccionar Asignaturas</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $indice => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]"
                            <?=(in_array($indice,$alumno->getAsignaturas()) ? 'checked': null)?>
                            >
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        <br>
        <br>
        <br>

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