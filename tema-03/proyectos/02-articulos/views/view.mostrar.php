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

        <form action="mostrar.php">
            <!-- Descripción -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo['descripcion'] ?>"
                    readonly>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="autor" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo['modelo'] ?>" readonly>
                <!-- <div class="form-text">Introduzca Autor del libro</div> -->
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select type="text" class="form-control" name="categoria" value="<?= $categorias[$articulo['categoria']] ?>" readonly>
            </div>
            <!-- Stock -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="text" class="form-control" name="unidades" value="<?= $articulo['unidades'] ?>" readonly>
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?= $articulo['precio'] ?>"
                    readonly>
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>

        <!-- pie del documento -->

        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>