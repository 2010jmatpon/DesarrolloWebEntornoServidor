<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Nuevo Movimento - GESBANK</title>
</head>

<body>
    <!-- bootstrap -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- Menú fijo principal -->
        <?php include "views/movimientos/partials/header.php" ?>
        <!-- formulario -->
        <form action="<?= URL ?>movimientos/create" method="POST">

            <div class="mb-3">
                <label for="" class="form-label">Cuenta</label>
                <select class="form-select" name="id_cuenta" id="">
                    <option selected disabled>Seleccione una cuenta </option>
                    <?php foreach ($this->movimientos as $cuenta): ?>
                        <option value="<?= $cuenta->id ?>">
                            <?= $cuenta->cuenta ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($this->errores['id_cuenta'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['id_cuenta'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Fecha -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha Hora</label>
                <input type="datetime-local" class="form-control" name="fecha_hora">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['fecha_hora'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['fecha_hora'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Concepto</label>
                <input type="text" class="form-control" name="concepto" maxlength="50">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['concepto'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['concepto'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Tipo -->
            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="radio_i" value="I">
                        <label class="form-check-label" for="radio_i">I</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="radio_r" value="R">
                        <label class="form-check-label" for="radio_r">R</label>
                    </div>
                </div>
            </div>

            <!-- Cantidad -->
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="float" class="form-control" name="cantidad" id="" placeholder="0">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['cantidad'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['cantidad'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>movimientos" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Crear</button>
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