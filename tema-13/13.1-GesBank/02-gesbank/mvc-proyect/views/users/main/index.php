<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Usuarios - GESBANK</title>
</head>

<body>
    <!-- capa principal -->
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <!-- cabecera o titulo -->
        <?php include "views/users/partials/header.php" ?>
        <!-- Menu principal -->
        <?php require_once "views/users/partials/menu.php" ?>
        <!-- Mensaje -->
        <?php require_once "template/partials/mensaje.php" ?>
       
    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>
</html>
