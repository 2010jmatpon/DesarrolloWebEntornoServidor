<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("template/partials/head.php");  ?>
    <title>Mostrar Movimiento - GESBANK</title>
</head>

<body>
    <!-- menú principal superior -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- cabecera o título -->
        <?php include "views/movimientos/partials/header.php" ?>
        <!-- formulario solo lectura -->
        <form>
            <div class="mb-3">
                <label for="" class="form-label">Cuenta</label>
                <input type="text" class="form-control" value="<?= $this->cuenta->num_cuenta ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Fecha Hora</label>
                <input type="datetime" class="form-control" name="fecha_hora" value="<?= $this->movimiento->fecha_hora ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Concepto</label>
                <input type="text" class="form-control" value="<?= $this->movimiento->concepto?>" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="float" class="form-control" name="cantidad" id="" value="<?= $this->movimiento->cantidad ?>" disabled>
            </div>
            <div class="mb-3">

                <label for="" class="form-label">Saldo Actual de la Cuenta</label>
                <input type="float" class="form-control" name="saldo" id="" value="<?= $this->cuenta->saldo ?>" disabled>
            </div>



            <div class="mb-3">

                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>movimientos" role="button">Volver</a>


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