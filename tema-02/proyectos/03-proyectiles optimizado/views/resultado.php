<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/plantilla/head.html' ?>
    <title>Proyecto 2.2 - Lanzamiento Proyectiles</title>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-takeoff-fill"></i>
            <span class="fs-4">Proyecto 2.2 - Lanzamiento Proyectiles</span>
        </header>


        <table class="table">
            <tbody>
                <tr>
                    <th>Valores Iniciales:</th>
                    <td></td>
                </tr>

                <!-- valor 1 -->
                <tr>
                    <td>Velocidad Inicial:</td>
                    <td>
                        <?= $vIni ?>m/s
                    </td>
                </tr>

                <!-- valor 2 -->
                <tr>
                    <td>Ángulo inclinación:</td>
                    <td>
                        <?= $angulo ?>º
                    </td>
                </tr>

                <tr>
                    <th>Resultados:</th>
                    <td></td>
                </tr>

                <tr>
                    <td>Ángulo en Radianes:</td>
                    <td>
                        <?= $radianes ?> Radianes
                    </td>
                </tr>

                <tr>
                    <td>Velocidad Inicial X:</td>
                    <td>
                        <?= $Vox ?> m/s
                    </td>
                </tr>

                <tr>
                    <td>Velocidad Inicial Y:</td>
                    <td>
                        <?= $Voy ?> m/s
                    </td>
                </tr>

                <tr>
                    <td>Alcance Máximo del Proyectil:</td>
                    <td>
                        <?= $xMax ?> m
                    </td>
                </tr>

                <tr>
                    <td>Tiempo de Vuelo del Proyectil:</td>
                    <td>
                        <?= $tiempo ?> s
                    </td>
                </tr>

                <tr>
                    <td>Altura Máxima del Proyectil:</td>
                    <td>
                        <?= $yMax ?> m
                    </td>
                </tr>


            </tbody>
        </table>
        <!-- botones de acción -->
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </div>
        <!-- pie del documento -->

        <?php include 'views/plantilla/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/plantilla/javascript.html' ?>
</body>

</html>