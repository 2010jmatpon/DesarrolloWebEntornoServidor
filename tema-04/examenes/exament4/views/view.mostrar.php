<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("layouts/layout.head.php");?>
    <title>Nuevo - Gestión Jugadores </title> 
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Formulario Nuevo Jugador</legend>

      <form action="mostrar.php" method="POST">
        <!-- id -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Id</label>
            <input type="text" class="form-control" name="id" value="<?= $jugador->getId(); ?>" readonly>
        </div>
        <!-- nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $jugador->getNombre() ?>" readonly>
        </div>
        <!-- número -->
        <div class="mb-3">
          <label for="" class="form-label">Número</label>
          <input type="number" class="form-control" name="numero" value="<?= $jugador->getNumero() ?>" readonly>
        </div>
        <!-- contrato -->
        <div class="mb-3">
          <label for="" class="form-label">Contrato</label>
          <input type="number" class="form-control" name="contrato" steep="0.01" value="<?= number_format($jugador->getContrato(), 2, ',', '.')?>" readonly>
        </div>
       
        <!-- Pais -->
        <div class="mb-3"> 
            <label for="" class="form-label">Pais</label>
            <input type="text" class="form-control" name="pais" value="<?= $paises[$jugador->getPais()] ?>" readonly>

        </div>
        <!-- equipos -->
        <div class="mb-3"> 
            <label for="" class="form-label">Equipo</label>
            <input type="text" class="form-control" name="equipo" value="<?= $equipos[$jugador->getEquipo()] ?>" readonly>

        </div>
        

        <!-- Perfiles List Checkbox -->
        <div class="mb-3">
            <label for="" class="form-label">Posiciones</label>
            <input type="text" class="form-control" name="posiciones" value="<?= implode(', ', $jugadores->listaPosiciones($jugador->getPosiciones(), $posiciones)) ?>" readonly>

        </div>
        
        <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
        <button type="reset" class="btn btn-danger">Borrar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
        
      </form>

      <br><br><br> <br>

    <!-- Pie del documento -->
    <?php include("partials/partial.footer.php");?>

    <!-- Bootstrap Javascript y popper -->
    <?php include("layouts/layout.javascript.php");?>
 
</body>
</html>