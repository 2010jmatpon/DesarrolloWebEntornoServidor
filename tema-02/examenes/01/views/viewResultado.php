<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include "views/layouts/head.html" ?>
    <title>Resultados</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Calculadora Conversor Decimal</span>
        </header>

        <legend>Resultados</legend>
        <table class="table">
            <tbody>

                <tr>
                    <td>
                        <b>
                            DECIMAL
                        </b>
                    </td>
                    <td>
                        <?= $Decimal ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>
                            <?= $operacion ?>
                        </b>
                    </td>
                    <td>
                        <?= $resultado ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <!-- botones de acción -->
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </div>
        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
    </div>
    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>