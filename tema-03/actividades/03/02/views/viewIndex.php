<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include "layouts/head.html" ?>
    <title>Actividad 3.3 Bucles while</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-bootstrap-reboot"></i>
            <span class="fs-6">Plantilla Bootstrap</span>
        </header>
        <!-- menu -->
        <legend>Tablas de Multiplicar</legend>
        <table class="table table-primary">
            <tbody>
                <?php for ($i = 1; $i <= 10; $i++) :?>
                    <tr>
                    <?php for ($j = 1; $j <= 10; $j++) :?>
                        <td> <?=($i * $j)?></td>
                    <?php endfor; ?>
                    </tr>
                <?php endfor; ?>

            </table>
                


            </tbody>
        </table>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>