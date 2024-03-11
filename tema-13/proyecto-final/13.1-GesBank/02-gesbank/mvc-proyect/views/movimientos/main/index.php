<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Movimientos - GESBANK</title>
</head>

<body>
    <!-- capa principal -->
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <!-- cabecera o titulo -->
        <?php include "views/movimientos/partials/header.php" ?>
        <!-- Menu principal -->
        <?php require_once "views/movimientos/partials/menu.php" ?>
        <!-- Mensaje -->
        <?php require_once "template/partials/mensaje.php" ?>
        <table class="table">
            <thead>
                <tr>

                    <th>Id </th>
                    <th>Numero de cuenta</th>
                    <th>Concepto</th>
                    <th>Fecha Hora</th>
                    <th>Tipo</th>
                    <th class="text-end">Cantidad</th>
                    <th class="text-end">Saldo</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->movimientos as $movimiento): ?>
                    <?php require_once "template/partials/modalCuentas.php"; ?>

                    <tr>
                        <td>
                            <?= $movimiento->id ?>
                        </td>
                        <td>
                            <?= $movimiento->cuenta ?>
                        </td>
                        <td>
                            <?= $movimiento->concepto ?>
                        </td>
                        <td>
                            <?= $movimiento->fecha_hora ?>
                        </td>
                        <td>
                            <?= $movimiento->tipo ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($movimiento->cantidad, 2, ',', '.') ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($movimiento->saldo, 2, ',', '.') ?> €
                        </td>
                        <td style="display:flex; justify-content:space-between;">
                            <a href="<?= URL ?>movimientos/mostrar/<?= $movimiento->id ?>" title="Mostrar" class="btn btn-warning<?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['show'])) ?
                                    'disabled' : null ?>"> <i class="bi bi-eye"></i> </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Nº Registros:
                        <?= $this->movimientos->rowCount() ?>
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