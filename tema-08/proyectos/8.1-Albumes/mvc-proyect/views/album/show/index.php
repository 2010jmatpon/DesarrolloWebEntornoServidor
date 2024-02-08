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
    <?php require_once("template/partials/menuAut.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- header -->
        <?php include 'views/album/partials/header.php' ?>

        <!-- comprobamos si existe error -->
        <?php include 'template/partials/error.php' ?>

        <h1>Detalles del Álbum</h1>
        <div>
            <h2>Título:
                <?= $this->albumes->titulo ?>
            </h2>
            <p>Descripción:
                <?= $this->albumes->descripcion ?>
            </p>
            <p>Autor:
                <?= $this->albumes->autor ?>
            </p>
            <p>Lugar:
                <?= $this->albumes->lugar ?>
            </p>
            <p>Fecha:
                <?= $this->albumes->fecha ?>
            </p>
            <p>Categoría:
                <?= $this->albumes->categoria ?>
            </p>
            <p>Etiquetas:
                <?= $this->albumes->etiquetas ?>
            </p>
            <p>Carpeta:
                <?= $this->albumes->carpeta ?>
            </p>
        </div>
        <div>
            <h2>Imágenes del Álbum</h2>
            <?php foreach ($imagenes as $imagen): ?>
                <img src="<?= $imagen->url ?>" alt="<?= $imagen->descripcion ?>">
            <?php endforeach; ?>
        </div>


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