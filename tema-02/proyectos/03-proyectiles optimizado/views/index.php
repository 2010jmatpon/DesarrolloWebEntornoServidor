<!DOCTYPE html>
<html lang="es">

<head>
  <?php include 'views/plantilla/head.html' ?>
  <title>Proyecto 2.2 - Lanzamiento Proyectiles</title>

</head>

<body>
  <!-- Capa principal -->
  <div class="container">
    <!-- cabecera documento -->
    <header class="pb-3 mb-4 border-bottom">
      <i class="bi bi-rocket-takeoff-fill"></i>
      <span class="fs-4">Proyecto 2.2 - Lanzamiento Proyectiles</span>
    </header>

    <legend>Lanzamiento de Proyectiles</legend>

    <form method="POST">
      <!-- valor 1 -->
      <div class="mb-3">
        <label class="form-label">Velocidad Inicial</label>
        <input type="number" name="vIni" class="form-control" placeholder="" aria-describedby="helpId" step="0.01"
          value="0.00" />
        <div id="helpId" class="text-muted">Velocidad en m/s</div>
      </div>

      <!-- valor 2 -->
      <div class="mb-3">
        <label class="form-label">Ángulo Lanzamiento</label>
        <input type="number" name="angulo" class="form-control" placeholder="" aria-describedby="helpId" step="0.01"
          value="0.00" />
        <div id="helpId" class="text-muted">Ángulo en grados</div>
      </div>

      <!-- botones de acción -->

      <button type="reset" class="btn btn-secondary">Borrar</button>
      <button type="submit" class="btn btn-primary" formaction="calcular.php">Calcular</button>

    </form>

    <!-- pie del documento -->

    <?php include 'views/plantilla/footer.html' ?>

  </div>

  <!-- javascript bootstrap 512 -->
  <?php include 'views/plantilla/javascript.html' ?>
</body>

</html>