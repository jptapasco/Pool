<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InovaByte</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
        <!-- PAGINA USUARIOS -->
        <div class="container">
            <h1 class="text-center mt-3">Clientes</h1>

            <div class="mt-5 d-flex justify-content-center">
                <input type="text" id="txtBuscar" class="form-control mx-2">
                <button class="btn btn-primary" id="btnBuscar">Buscar</button>
            </div>
            <div class="alert alert-dark mt-3" role="alert" id="alertaNoResultados" style="display: none;">
                No se encontraron resultados.
            </div>
			<div class="container mt-5">

				<table class="table table-striped mt-5">
					<thead>
						<tr>
							<th>ID</th>
							<th>Documento</th>
							<th>Nombre</th>
							<th>Teléfono</th>
							<th>Horas Jugadas</th>
							<th>Horas Obsequiadas</th>
							<th>Registrado en</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($clientes as $key => $cliente): ?>
							<tr>
								<td><?php echo $cliente->id_cliente; ?></td>
								<td><?php echo $cliente->documento; ?></td>
								<td><?php echo $cliente->nombres; ?></td>
								<td><?php echo $cliente->telefono; ?></td>
								<td><?php echo $cliente->horas_jugadas; ?></td>
								<td><?php echo $cliente->horas_regalo; ?></td>
								<td><?php echo $cliente->created_at; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
        </div>
        <!-- FIN PAGINA USUARIOS -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

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

    <script>
        $(document).ready(function () {
            // Manejar el evento de clic en el botón de búsqueda
            $("#btnBuscar").click(function () {
                buscar();
            });

            // Manejar el evento de presionar "Enter" en el campo de búsqueda
            $("#txtBuscar").keypress(function (e) {
                if (e.which === 13) { // 13 es el código de tecla para "Enter"
                    buscar();
                }
            });

            function buscar() {
                // Obtener el valor de la barra de búsqueda
                var searchTerm = $("#txtBuscar").val().toLowerCase();

                var resultadosEncontrados = false;

                // Filtrar las filas de la tabla según el término de búsqueda
                $("tbody tr").each(function () {
                    var textoFila = $(this).text().toLowerCase();
                    if (textoFila.includes(searchTerm)) {
                        $(this).show();
                        resultadosEncontrados = true;
                    } else {
                        $(this).hide();
                    }
                });

                // Mostrar u ocultar la alerta según los resultados
                if (resultadosEncontrados) {
                    $("#alertaNoResultados").hide();
                } else {
                    $("#alertaNoResultados").show();
                }
            }
        });
    </script>

</body>
</html>