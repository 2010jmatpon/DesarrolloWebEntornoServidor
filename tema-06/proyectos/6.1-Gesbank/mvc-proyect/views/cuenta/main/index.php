<!doctype html>
<html lang="es">

<!-- head -->
<head>
	<?php require_once("template/partials/head.php") ?>
	<title><?= $this->title ?></title>
<head>


<body>
	<!-- Menú Principal -->
	<?php require_once("template/partials/menu.php") ?>
	<br><br><br>

	<!-- Page Content -->
	<div class="container">
		<!-- cabecera  -->
		<?php require_once("views/cuenta/partials/header.php") ?>

		<!-- mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- errores -->
		<?php require_once("template/partials/error.php") ?>



		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Cuentas
			</div>
			<div class="card-header">
				<!-- menu cuentas -->
				<?php require_once("views/cuenta/partials/menu.php") ?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<!-- personalizado -->
							<th>Id</th>
							<th>Numero de Cuenta</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th >Fecha Alta</th>
							<th class="text-end">Fecha Último Movimiento</th>
							<th class="text-end">Nª Movts</th>						
							<th>Saldo</th>						
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>

						<!-- Objeto clase pdostatement en foreach -->
						<?php foreach ($this->cuentas as $cuenta): ?>
							<tr>
								<!-- Formatos distintos para cada  columna -->

								<!-- Datos de cuentas -->
								<td>
									<?= $cuenta->id ?>
								</td>
								<td>
									<?= $cuenta->num_cuenta ?>
								</td>
								<td>
									<?= $cuenta->nombre ?>
								</td>
								<td>
									<?= $cuenta->apellidos ?>
								</td>
								<td>
									<?= $cuenta->fecha_alta ?>
								</td>
								<td class="text-end">
									<?= $cuenta->fecha_ul_mov ?>
								</td>
								<td class="text-end">
									<?= $cuenta->num_movtos ?>
								</td>
								<td>
									<?= $cuenta->saldo ?>
								</td>
								

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>cuenta/delete/<?= $cuenta->id ?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i></a>

									<!-- botón  editar -->
									<a href="<?= URL ?>cuenta/edit/<?= $cuenta->id ?>" title="Editar">
										<i class="bi bi-pencil-square"></i></a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>cuenta/show/<?= $cuenta->id ?> ?>" title="Mostrar">
										<i class="bi bi-card-text"></i></a>

								</td>
							</tr>

						<?php endforeach; ?>


					</tbody>
					
				</table>

			</div>
			<div class="card-footer">
				<small class="text-muted"> Nº Cuentas: 
					<?= $this->cuentas->rowCount(); ?>
				</small>
			</div>
		</div>
	</div>
	<br><br><br>

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>