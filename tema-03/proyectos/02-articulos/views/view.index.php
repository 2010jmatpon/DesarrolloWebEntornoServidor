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

        <!-- Menu principal -->
        <?php include 'views/partials/menu_prin.php' ?>

        <table class="table">
            <thead>
                <!-- Encabezado Tabla -->
                <tr>
                    <!-- personalizado -->
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Modelo</th>
                    <th>Categoria</th>
                    <th class="text-end">Unidades</th>
                    <th class="text-end">Precio</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <!-- Mostramos el cuerpo de la tabla -->
            <tbody>
                <?php foreach ($articulos as $articulo): ?>
                    <tr>
                        <!-- Mismo formato a cada campo de la tabla -->
                        <td>
                            <?= $articulo['id'] ?>
                        </td>
                        <td>
                            <?= $articulo['descripcion'] ?>
                        </td>
                        <td>
                            <?= $articulo['modelo'] ?>
                        </td>
                        <td>
                            <?= $categorias[$articulo['categoria']] ?>
                        </td>
                        <td class="text-end">
                            <?= $articulo['unidades'] ?>
                        </td>
                        <td class="text-end">
                            <?= number_format ($articulo['precio'], 2, ',', '.') ?>€
                        </td>
                        <td>
                            <a href="eliminar.php?id=<?= $articulo['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash3-fill"></i></a>
                            <a href="editar.php?id=<?= $articulo['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-fill"></i></a>
                            <a href="mostrar.php?id=<?= $articulo['id'] ?>" title="Mostrar">
                                <i class="bi bi-plus-circle-fill"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </form>

        <!-- pie del documento -->

        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>