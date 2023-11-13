<!DOCTYPE html>
<html lang="es">

<head>

    <?php include "views/layouts/head.html" ?>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php" ?>

        <legend>Formulario Nuevo Articulo</legend>

        <form action="update.php?id=<?= $id ?>" method="POST">

        <div class="form-floating mb-3">
                
                <input type="number" class="form-control" name="id" value="<?=$articulo->getId()?>" readonly>
                <label class="form-label">id</label>
            </div>
            
            <!-- descripción -->
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" name="descripcion" value="<?=$articulo->getDescripcion()?>">
                <label class="form-label">Descripción</label>
            </div>

            <!-- Modelo -->
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control" name="modelo" value="<?=$articulo->getModelo()?>">
                <label class="form-label">Modelo</label>
            </div>

            <!-- Marca -->
            <div class="form-floating mb-3">
                
                <select class="form-select" aria-label="Default select example" name="marca">
                    <?php foreach($marcas as $key => $marca): ?>
                        <option value="<?=$key?>"
                        <?=($articulo->getMarca() == $key)?'selected':null ?>
                        >
                        <?=$marca?></option>
                    <?php endforeach; ?>
                </select>
                <label class="form-label">Marca</label>
            </div>

            <!-- Unidades -->
            <div class="form-floating mb-3">
                
                <input type="number" class="form-control" name="unidades" value="<?=$articulo->getUnidades()?>">
                <label class="form-label">Unidades</label>
            </div>

            <!-- Precio -->
            <div class="form-floating mb-3">
                
                <input type="number" class="form-control" name="precio" step="0.01" value="<?=$articulo->getPrecio()?>">
                <label class="form-label">Precio (€)</label>
            </div>

            <!-- Categorías -->
            <div class="mb-3">
                <label class="form-floating mb-3">Seleccionar Categorías</label>
                <div class="form-control">
                    <?php foreach ($categorias as $indice => $categoria): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="categorias[]"
                            <?=(in_array($indice,$articulo->getCategorias()) ? 'checked': null)?>
                            >
                            <label class="form-check-label" for="">
                                <?= $categoria ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        <br>
        <br>
        <br>

    </div>

    <?php
    include 'views/partials/footer.html';
    ?>
    <!-- javascript bootstrap 512 -->
    <?php
    include "views/layouts/javascript.html";
    ?>

</body>

</html>