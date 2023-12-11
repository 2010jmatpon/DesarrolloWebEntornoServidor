<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
    <title>Editar Alumno - Proyecto 5.2 - Gestión Alumnos PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.php' ?>
        <legend>Formulario Editar Corredor</legend>

        <!-- Formulario Editar Alumno -->
        <form action="update.php?id=<?= $corredor->id ?>" method="POST">

           <!-- id -->
            <!-- <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id">
            </div>  -->
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$corredor->nombre?>">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$corredor->apellidos?>">
            </div>
            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$corredor->ciudad?>">
            </div>
            <!--Sexo-->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Sexo</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Hombre
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Mujer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault3" >
                        Sin Especificar
                    </label>
                </div>
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNac" value="<?=$corredor->fechaNac?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$corredor->email?>">
            </div>
            <!-- Dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni" value="<?=$corredor->dni?>">
            </div>
            <!-- Categoría Select -->
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="id_categoria">
                    <option selected disabled>Seleccione Categoria</option>
                    <?php foreach ($categorias as $data): ?>
                        <option value="<?= $data->id ?>" <?= ($corredor->id_categoria == $data->id) ? 'selected' : null ?>>
                            <?= $data->categoria ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Club Select -->
            <div class="mb-3">
                <label for="id_club" class="form-label">Club</label>
                <select class="form-select" aria-label="Default select example" name="id_club">
                    <option selected disabled>Seleccione Club</option>
                    <?php foreach ($clubs as $data): ?>
                        <option value="<?= $data->id ?>" <?= ($corredor->id_club == $data->id) ? 'selected' : null ?>>
                            <?= $data->club ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>
        <br>
        <br>
        <br>


    </div>
    <!-- Pie de documento -->
    <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>