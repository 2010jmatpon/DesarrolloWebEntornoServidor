<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/plantilla/head.html' ?>
    <title>Proyecto 3.1 - Gestión de libros</title>
    
</head>

<body>
    
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-book-half"></i>
            <span class="fs-4">Proyecto 3.1 - Gestión de libros</span>
        </header>
        <legend>Tabla Nuevo Libro</legend>

        <form action="mostrar.php">
        <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?=$libro['id'] ?>" readonly>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" value="<?=$libro['titulo'] ?>" readonly>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Autor -->
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor" value="<?=$libro['autor'] ?>" readonly>
                <!-- <div class="form-text">Introduzca Autor del libro</div> -->
            </div>
            <!-- Género -->
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" name="genero" value="<?=$libro['genero'] ?>" readonly>
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?=$libro['precio'] ?>" readonly>
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>


        </form>

        <!-- pie del documento -->

        <?php include 'views/plantilla/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/plantilla/javascript.html' ?>
</body>

</html>