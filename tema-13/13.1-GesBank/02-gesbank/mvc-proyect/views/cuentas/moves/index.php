<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Cuentas - GESBANK</title>
</head>

<body>
    <!-- capa principal -->
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <!-- cabecera o titulo -->
        <?php include "views/cuentas/partials/header.php" ?>
        <!-- Menu principal -->
        <?php require_once "views/cuentas/partials/menu.php" ?>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Nº Registros:
                        <?= count($this->movimientos) ?>
                    </td>
                </tr>
            </tfoot>

        </table>
        <div class="mb-3">
            <a name="" id="" class="btn btn-secondary" href="<?= URL ?>cuentas" role="button">Volver <i
                    class="bi bi-arrow-90deg-left"></i></a>
        </div>
    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>