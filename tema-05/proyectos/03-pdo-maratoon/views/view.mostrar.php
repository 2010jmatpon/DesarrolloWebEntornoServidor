<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
    <title>Mostrar Alumno - Proyecto 5.2 - Gestión Alumnos PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.php' ?>
        <legend>Mostrar Alumno Alumno</legend>

        <!-- Formulario Editar Alumno -->
        <form >

            <!-- id -->
            <!-- <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id">
            </div>  -->
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$corredor->nombre?>" disabled>
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$corredor->apellidos?>" disabled>
            </div>
            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$corredor->ciudad?>" disabled>
            </div>
            <!--Sexo-->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Sexo</label>
                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="<?=$corredor->sexo?>" disabled>
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNac" value="<?=$corredor->fechaNac?>" disabled>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$corredor->email?>" disabled>
            </div>
            <!-- Dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni" value="<?=$corredor->dni?>" disabled>
            </div>
            <!-- Categoría Select -->
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" name="categoria" value="<?=$categoria?>" disabled>
            </div>
            <!-- Club Select -->
            <div class="mb-3">
                <label for="id_club" class="form-label">Club</label>
                <input type="text" class="form-control" name="club" value="<?=$clubs?>" disabled>

            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

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