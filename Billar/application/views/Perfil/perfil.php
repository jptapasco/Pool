<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>InovaByte</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php $this->load->view('Menu/menu'); ?>

		<!-- Main content -->
		<section class="content">
			<!-- Default box -->
			<div class="card mt-4">
				<div class="card-header">
					<h3 class="card-title">DATOS DE USUARIO</h3>
				</div>
				<!-- CARD BODY -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Documento:</th>
									<td><?php echo $usuario['documento']; ?></td>
								</tr>
								<tr>
									<th>Nombre:</th>
									<td><?php echo $usuario['nombres']; ?></td>
								</tr>
								<tr>
									<th>Teléfono:</th>
									<td><?php echo $usuario['telefono']; ?></td>
								</tr>
								<tr>
									<th>Rol:</th>
									<td><?php echo $usuario['rol']; ?></td>
								</tr>
								<tr>
									<th>Correo Electrónico:</th>
									<td><?php echo $usuario['correo']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
                <div class="text-center">
                    <a href="<?php echo site_url('DashboardAdmin/perfilEditable') ?>" class="btn btn-secondary">Editar</a>
                </div>
				<!-- /.card-body -->
				<div class="card-footer">
				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Footer -->
	<?php $this->load->view('Footer/footer'); ?>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url() ?>/assets/dist/js/demo.js"></script>
</body>

</html>
