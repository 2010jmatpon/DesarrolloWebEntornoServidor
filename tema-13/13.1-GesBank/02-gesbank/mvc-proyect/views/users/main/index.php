<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
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
        <table class="table">
            <thead>
                <tr>

                    <th>Id </th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->users as $user): ?>

                    <tr>
                        <td>
                            <?= $user->id ?>
                        </td>
                        <td>
                            <?= $user->name ?>
                        </td>
                        <td>
                            <?= $user->email ?>
                        </td>
                        <td>
                            <?= $user->password ?>
                        </td>
                        <td>
                            <?= $user->rol ?>
                        </td>
                        <td style="display:flex; justify-content:space-between;">
                            <a href="<?= URL ?>users/delete/<?= $user->id ?>" title="Eliminar"
                                onclick="return confirm('Confirmar eliminación Usuario') " class="btn btn-danger"
                                <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete'])) ?
                                    'disabled' : null ?>> <i class="bi bi-trash"></i> </a>
                            <a href="<?= URL ?>users/editar/<?= $user->id ?>" title="Editar" class="btn btn-primary <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['edit'])) ?
                                    'disabled' : null ?>"> <i class="bi bi-pencil"></i> </a>
                            <!-- <a href="<?= URL ?>cuentas/mostrar/<?= $cuenta->id ?>" title="Mostrar" class="btn btn-warning<?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['show'])) ?
                                    'disabled' : null ?>"> <i class="bi bi-eye"></i> </a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Nº Registros:
                        <?= $this->users->rowCount() ?>
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>