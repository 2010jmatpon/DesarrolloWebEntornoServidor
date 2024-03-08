<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Editar Usuario - GESBANK</title>
</head>

<body>
    <!-- bootstrap -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- Menú fijo principal -->
        <?php include "views/users/partials/header.php" ?>
        <!-- formulario -->
        <form method="POST" action="<?= URL ?>users/updatePass">

            <!-- campo password -->
            <div class="mb-3">
                <label class="form-label">Nuevo Password</label>

                <input type="password" class="form-control" name="password" required autocomplete="current-password">
                <span class="form-text text-danger" role="alert">
                    <?= $this->erroresVal['password'] ??= null ?>
                </span>


            </div>

            <!-- campo password confirm-->
            <div class="mb-3">
                <label class="form-label">Confirmación Nuevo Password</label>
                <input type="password" class="form-control" name="password_confirm" required
                    autocomplete="current-password">
            </div>
    
    <!-- botones de acción -->
    <div class="mb-3">
        <a name="" id="" class="btn btn-secondary" href="<?= URL ?>users" role="button">Cancelar</a>
        <button type="reset" class="btn btn-danger">Borrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
    </div>

    <br><br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>


    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>