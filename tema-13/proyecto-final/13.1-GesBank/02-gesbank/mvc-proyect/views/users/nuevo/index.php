<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Nuevo Usuario - GESBANK</title>
</head>

<body>
    <!-- bootstrap -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- Menú fijo principal -->
        <?php include "views/users/partials/header.php" ?>
        <!-- formulario -->
        <form action="<?= URL ?>users/create" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" name="name">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['name'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['name'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" >
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['email'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['email'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- campo password -->
            <div class="mb-3 row">
                <label for="password" class="form-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control <?= (isset($this->errores['password'])) ? 'is-invalid' : null ?>"
                        name="password" required autocomplete="new-password">

                    <?php if (isset($this->errores['password'])): ?>
                        <span class="form-text text-danger" role="alert">
                            <?= $this->errores['password'] ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- password confirm -->
            <div class="mb-3 row">
                <label for="password-confirm" class="form-label">Confirmar Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password-confirm" required
                        autocomplete="new-password">
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Rol</label>
                <select class="form-select" name="rol" id="">
                    <option selected disabled>Seleccione un rol </option>
                    <?php foreach ($this->users as $rol): ?>
                        <option value="<?= $rol->id ?>">
                            <?= $rol->rol ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($this->errores['rol'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['rol'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>users" role="button">Cancelar</a>
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