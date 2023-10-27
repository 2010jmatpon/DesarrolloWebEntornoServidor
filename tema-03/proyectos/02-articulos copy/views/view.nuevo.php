<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 3.1 - Gestión de libros</title>

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
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="autor" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo">
                <!-- <div class="form-text">Introduzca Autor del libro</div> -->
            </div>
            <!-- Marca -->
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select" aria-label="Default select example" name="marca">
                    <option selected disabled>Seleccione una marca</option>
                    <?php foreach ($marcas as $key => $marca): ?>
                        <option value="<?= $key ?>">
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Stock -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="text" class="form-control" name="unidades">
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01">
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>
            <!-- Categorias -->
            <div class="mb-3">
                <label for="categorias" class="form-label">Seleccione Categorias</label>
                <div class="form-control">
                    <?php foreach ($categorias as $key => $categoria): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $key ?>" name="categorias[]">
                            <label class="form-check-input" for="">
                                <?=$categoria?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <!-- <div class="form-text">Género del libro</div> -->
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