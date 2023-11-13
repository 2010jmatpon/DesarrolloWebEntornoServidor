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

        <legend>Articulo seleccionado</legend>
        <form>

            <form action="mostrar.php">

                <div class="mb-3">
                    <label for="id" class="form-label">Id: </label>
                    <input type="text" class="form-control" name="id" value="<?= $articulo->getId() ?>" disabled>

                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción: </label>
                    <input type="text" class="form-control" name="descripcion" value="<?= $articulo->getDescripcion() ?>"
                        disabled>

                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo: </label>
                    <input type="text" class="form-control" name="modelo" value="<?= $articulo->getModelo() ?>" disabled>

                </div>

                <!-- Falta poner que no muestre los números sino los nombres. -->
                <!-- MARCAS -->
                <div class="mb-3">
                    <label for="categoria" class="form-label">Marcas: </label>
                    <input type="text" class="form-control" name="categoria" value="<?= $articulo->getMarca() ?>"
                        disabled>

                </div>

                <!-- CATEGORIAS -->
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria: </label>
                    <input type="text" class="form-control" name="categoria"
                        value="<?= implode(", ", $articulo->getCategorias()) ?>" disabled>

                </div>

                <div class="mb-3">
                    <label for="unidades" class="form-label">Unidades: </label>
                    <input type="number" class="form-control" name="unidades" value="<?= $articulo->getUnidades() ?>"
                        disabled>

                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio: </label>
                    <input type="number" class="form-control" name="precio" value="<?= $articulo->getPrecio() ?>" disabled>

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