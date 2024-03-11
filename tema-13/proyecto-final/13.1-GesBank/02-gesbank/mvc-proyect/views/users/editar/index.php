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
        <form action="<?= URL ?>users/update/<?= $this->id ?>" method="POST">
            <input type="number" class="form-control" name="id"
                value="<?= isset($this->user) && isset($this->users->id) ? $this->users->id : '' ?>" hidden>

            <div class="mb-3">
                <label for="" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" name="name" value="<?= $this->users->name ?>">
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
                <input type="email" class="form-control" name="email" value="<?= $this->users->email ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['email'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['email'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Rol</label>
                <select class="form-select" name="rol" id="">
                    <option disabled>Seleccione un rol</option>
                    <?php foreach ($this->roles as $rol): ?>
                        <option value="<?= $rol->id ?>" <?= ($this->users->rol == $rol->id) ? "selected" : null; ?>>
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

            <div class="mb-3">
                <label class="form-label">Nuevo Password</label>

                <input type="password" class="form-control" name="password">
                <span class="form-text text-danger" role="alert">
                    <?= $this->erroresVal['password'] ??= null ?>
                </span>


            </div>

            <!-- campo password confirm-->
            <div class="mb-3">
                <label class="form-label">Confirmación Nuevo Password</label>
                <input type="password" class="form-control" name="password_confirm" 
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