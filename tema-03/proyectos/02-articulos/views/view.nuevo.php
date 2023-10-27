<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 3.2 - Tabla artículos</title>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>
        <legend>Tabla Artículos</legend>

        <form action="create.php" method="POST">
            <!-- Descripción -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="autor" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo">
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label for="genero" class="form-label">Categoría</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                <option selected disabled>Seleccione una categoria</option>
                <?php foreach ($categorias as $key => $categoria): ?>
                    <option value="<?=$key?>"><?=$categoria ?></option>
                <?php endforeach; ?></select>
            </div>
            <!-- Stock -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="text" class="form-control" name="unidades">
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01">
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Añadir</button>

        </form>

        <!-- pie del documento -->

        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>