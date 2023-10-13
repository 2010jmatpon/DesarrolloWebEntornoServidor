<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include "layouts/head.html" ?>
    <title>Actividad 3.1 Formulario Registro</title>
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

        <legend>Regístrate</legend>
        <form method="POST" action="acceso.php">

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

            <!-- perfiles -->
            <select class="form-select" aria-label="Default select example" name="perfil">
                <option selected>Seleccione Perfil</option>
                <option value="1">Administrador</option>
                <option value="2">Editor</option>
                <option value="3">Usuario</option>
            </select>

            <br>

            <!-- botones de acción -->
            <button type="reset" class="btn btn-secondary">Borrar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>

        </form>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>