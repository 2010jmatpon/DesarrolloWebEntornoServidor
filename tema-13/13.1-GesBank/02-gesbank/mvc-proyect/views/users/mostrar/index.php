<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Mostrar Usuario - GESBANK</title>
</head>

<body>
    <!-- bootstrap -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- Menú fijo principal -->
        <?php include "views/users/partials/header.php" ?>
        <!-- formulario -->
        <form method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" name="name" value="<?= $this->users->name ?>" disabled>
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $this->users->email ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Rol</label>
                <input type="text" class="form-control" name="rol" value="<?= $this->users->rol ?>" disabled>

            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>users" role="button">Volver</a>
               
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