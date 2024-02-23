<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Contactar - Gesbank</title>

</head>

<body>
    <!-- menu fijo superior -->
    <?php require_once "template/partials/menuBar.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- cabecera -->
        <?php include "views/clientes/partials/header.php" ?>
        <?php require_once "template/partials/mensaje.php" ?>

        <!-- formulario de cliente -->
        <form action="<?= URL ?>contactar/validar" method="POST">
            <!-- campos de cliente -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" >
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['nombre'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['nombre'] ?>
                    </span>
                <?php endif; ?>
            </div>

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
            <div class="mb-3">
                <label for="" class="form-label">Asunto</label>
                <input type="text" class="form-control" name="asunto" >
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['asunto'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['asunto'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="mb-3  input-group-lg">
                <label for="" class="form-label">Mensaje</label>
                <input type="text" class="form-control" name="mensaje" >
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['mensaje'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['mensaje'] ?>
                    </span>
                <?php endif; ?>
            </div>
            
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>
