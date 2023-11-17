<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 4.3 - Gestión Alumnos</title>
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
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Curso</th>
                    <th>Asignaturas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>

                <?php foreach ($alumnos -> getTabla() as $indice => $alumno): ?>
                    <tr>
                        <!-- Formatos distintos para cada  columna -->

                        <!-- Detalles de artículos -->
                        <td><?= $alumno->getId() ?></td>
                        <td><?= $alumno->getNombre() ?></td>
                        <td><?= $alumno->getApellidos() ?></td>
                        <td><?= $alumno->getEmail() ?></td>
                        <td><?= $alumno->getEdad() ?></td>
                        <td><?= $cursos[$alumno->getCurso()] ?></td>
                        <td><?= implode(', ', ArrayAlumno::mostrarAsignatura($asignaturas, $alumno->getAsignaturas())) ?></td>

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