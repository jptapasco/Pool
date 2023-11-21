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
  <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php $this->load->view('Menu/menu'); ?>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ingresos Semanales</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                    <thead class="thead-light">
                    <tr>
                        <th>Dia</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Domingo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Apertura Caja</td>
                        <td>Internet</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Cierre Caja</td>
                        <td>Internet</td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>Internet</td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                        <td> 4</td>
                        <td>X</td>
                        <td>X</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Empleados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Documentos</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Rol</th>
                          <th>Contraseña</th>
                          <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1;?>
                        <?php foreach ($usuarios as $key => $usuario): ?>
                        <tr>
                            <td><?php echo $contador ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                            <td><?php echo $usuario->nombres ?></td>
                        </tr>
                        <?php $contador++; ?>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
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
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)').css('margin-bottom', '15px');
  });
</script>
</body>
</html>
