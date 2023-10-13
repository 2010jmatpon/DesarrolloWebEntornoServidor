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
            <i class="bi bi-bootstrap-reboot"></i>
            <span class="fs-6">Plantilla Bootstrap</span>
        </header>
        <!-- menu -->
        <menu>
            <?php if ($perfil == 1): ?>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Eliminar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>

            <?php elseif ($perfil == 2): ?>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>
            <?php endif; ?>
        </menu>

        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Campo</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Usuario</td>
                    <td>
                        <?= $usuario ?>
                    </td>
                </tr>
                <tr>
                    <td scope="row">Email</td>
                    <td>
                        <?= $email ?>
                    </td>
                </tr>
                <tr>
                    <td scope="row">Contraseña</td>
                    <td>
                        <?= $password ?>
                    </td>
                </tr>
                <tr>
                    <td scope="row">Perfil</td>
                    <td>
                        <?= $perfil ?>
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