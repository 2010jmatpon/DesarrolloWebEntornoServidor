<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 5.1 - Gestión Alumnos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Tabla Artículos</legend>

        <!-- Menu Principal -->
        <?php include 'views/partials/menu_prin.php' ?>

        <!-- Notificacion -->
        <?php include 'views/partials/notificacion.php'?>
        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <!-- personalizado -->
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Categorias</th>
                    <th class="text-end">Stock</th>
                    <th class="text-end">Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>

                <?php foreach ($articulos -> getTabla() as $indice => $articulo): ?>
                    <tr>
                        <!-- Formatos distintos para cada  columna -->

                        <!-- Detalles de artículos -->
                        <td><?= $articulo->getId() ?></td>
                        <td><?= $articulo->getDescripcion() ?></td>
                        <td><?= $articulo->getModelo() ?></td>
                        <td><?= $marcas[$articulo->getMarca()] ?></td>
                        <td><?= implode(', ', ArrayArticulos::mostrarCategorias($categorias, $articulo->getCategorias())) ?></td>
                        <td class="text-end"><?= $articulo->getUnidades() ?></td>
                        <td class="text-end"><?= number_format($articulo->getPrecio(), 2, ',', '.')?> €</td>

                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?indice=<?= $indice ?>" title="Eliminar">
                            <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?indice=<?= $indice ?>" title="Mostrar">
                            <i class="bi bi-card-text"></i></a>

                        </td>
                    </tr>

                <?php endforeach; ?>


            </tbody>
        </table>



        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>