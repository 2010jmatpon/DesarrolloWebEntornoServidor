<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php") ?>
    <title>
        <?= $this->title ?>
    </title>
</head>

<body>
    <!-- Menú Principal -->
    <?php require_once("template/partials/menu.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- header -->
        <?php include 'views/cuenta/partials/header.php' ?>

        <legend>Formulario Editar Cuenta</legend>

        <!-- Formulario Editar Cuenta -->
        <form action="<?= URL ?>cuenta/update/<?= $this->id ?>" method="POST">

        
            <input type="number" class="form-control" name="id" value="<?= $this->cuenta->id ?>" hidden>

            <!-- Num Cuenta -->
            <div class="mb-3">
                <label for="num_cuenta" class="form-label">Número Cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?= $this->cuenta->num_cuenta ?>">
            </div>

            <!-- Curso Select -->
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-select" aria-label="Default select example" name="id_cliente">
                    <option selected disabled>Seleccione Cliente</option>
                    <?php foreach ($this->clientes as $data): ?>
                        <option value="<?= $data->id ?>" <?= ($this->cuenta->id_cliente == $data->id) ? 'selected' : null ?>>
                            <?= $data->cliente ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Fecha Alta -->
            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha Alta</label>
                <input type="text" class="form-control" name="fecha_alta" value="<?= $this->cuenta->fecha_alta ?>">
            </div>
            <!-- Fecha Ult Mov -->
            <div class="mb-3">
                <label for="fecha_ul_mov" class="form-label">Fecha Último Movimiento</label>
                <input type="text" class="form-control" name="fecha_ul_mov" value="<?= $this->cuenta->fecha_ul_mov ?>">
            </div>
            <!-- Nº Movs -->
            <div class="mb-3">
                <label for="num_movtos" class="form-label">Número de Movimientos</label>
                <input type="text" class="form-control" name="num_movtos" value="<?= $this->cuenta->num_movtos ?>">
            </div>

            <!-- Saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?= $this->cuenta->saldo ?>">
            </div>


            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>cuenta" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Reestablecer</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>

        <br>
        <br>
        <br>

        <!-- Pié del documento -->
        <?php include 'template/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'template/partials/javascript.php' ?>
</body>

</html>