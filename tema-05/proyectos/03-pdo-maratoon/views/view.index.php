<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Home - Proyecto 5.2 - Gestión Alumnos PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Tabla Alumnos</legend>

        <!-- Menu Principal -->
        <?php include 'views/partials/menu.php' ?>

        <!-- Notificación -->
        <?php include 'views/partials/notify.php' ?>

        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <!-- personalizado -->
                    <th>Id</th>
                    <th>Corredor</th>
                    <th>Ciudad</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Categoría</th>
                    <th>Club</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>

                <!-- Objeto clase pdostatement en foreach -->
                <?php foreach ($corredores as $corredor): ?>
                    <tr>
                        <!-- Formatos distintos para cada  columna -->

                        <!-- Detalles de alumnos -->
                        <td><?= $corredor->id?></td>
                        <td><?= $corredor->corredor ?></td>
                        <td><?= $corredor->ciudad ?></td>
                        <td><?= $corredor->email?></td>
                        <td><?= $corredor->edad ?></td>
                        <td><?= $corredor->categoria ?></td>
                        <td><?= $corredor->club ?></td>
                       
                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?id=<?= $corredor->id ?>" title="Eliminar">
                            <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?id=<?= $corredor->id ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?id=<?= $corredor->id ?> ?>" title="Mostrar">
                            <i class="bi bi-card-text"></i></a>

                        </td>
                    </tr>

                <?php endforeach; ?>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nº Corredores
                        <?= $corredores->rowCount(); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- Cerramos conexión y resultado -->
        <?php  $corredores = null; $conexion->cerrar_conexion();?>



        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>