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

        <form>
            <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="number" name="id" class="form-control" placeholder="" aria-describedby="helpId" />
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- pie del documento -->

        <?php include 'views/plantilla/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/plantilla/javascript.html' ?>
</body>

</html>