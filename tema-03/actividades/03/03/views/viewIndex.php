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

        <legend>Regístrate para mostrar tu día de la Semana</legend>
        <form method="POST">

            <!-- usuario -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="usuario">
                <div id="emailHelp" class="form-text">Entre 8 y 15 caracteres</div>
            </div>

            <!-- email -->
            <label class="form-label">Email Address</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Introduce email valido</div>

            <!-- password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <!-- password de confirmación -->
            <div class="mb-3">
                <label class="form-label">Password de Confirmacion</label>
                <input type="password" class="form-control" name="passwordConfirm">
            </div>

            <br>

            <!-- botones de acción -->
            <button type="reset" class="btn btn-secondary">Borrar</button>
            <button type="submit" class="btn btn-primary" formaction="acceso.php">Registrar</button>

        </form>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>