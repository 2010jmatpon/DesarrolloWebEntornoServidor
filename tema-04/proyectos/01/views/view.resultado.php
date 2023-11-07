<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 4.1 Calculadora POO</title>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>
        <legend>Calculadora POO</legend>

        <form action="calcular.php" method="POST">
            <!-- Valor 1 -->
            <div class="mb-3">
                <label for="valor1" class="form-label">Valor 1</label>
                <input type="number" class="form-control" name="valor1" step="0.01" value="<?=$calcular->getValor1() ?>" readonly>
            </div>
            <!-- Valor 2 -->
            <div class="mb-3">
                <label for="valor2" class="form-label">Valor 2</label>
                <input type="number" class="form-control" name="valor2" step="0.01" value="<?=$calcular->getValor2() ?>" readonly>
            </div>
            <!-- Operacion -->
            <div class="mb-3">
                <label for="operacion" class="form-label">Operacion</label>
                <input type="text" class="form-control" name="operacion" value="<?=$calcular->getOperacion() ?>" readonly>
            </div>
            <!-- Resultado -->
            <div class="mb-3">
                <label for="resultado" class="form-label">Resultado</label>
                <input type="number" class="form-control" name="resultado" step="0.01" value="<?=$calcular->getResultado() ?>" readonly>
            </div>

            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="sumar">Sumar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="restar">Restar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="multiplicar">Multiplicar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="dividir">Dividir</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="potencia">Potencia</button>

        </form>

        <!-- pie del documento -->

        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 512 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>