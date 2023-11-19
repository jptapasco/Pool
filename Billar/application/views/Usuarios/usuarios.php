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
            <h1 class="text-center mt-3">Usuarios</h1>

            <div class="mt-5 d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
                <input type="text" id="txtBuscar" class="form-control mx-2">
                <button class="btn btn-primary" id="btnBuscar">Buscar</button>
            </div>

            <div class="alert alert-dark mt-3" role="alert" id="alertaNoResultados" style="display: none;">
                No se ha encontrado ningún usuario con la información suministrada.
            </div>

            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">ROL</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($respuesta as $key => $Usuario) : ?>
                        <tr>
                            <th scope="row"> <?php echo $Usuario->id_usuario ?> </th>
                            <th> <?php echo $Usuario->nombres ?> </th>
                            <th> <?php echo $Usuario->correo ?> </th>
                            <th> <?php echo $Usuario->telefono ?> </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- FIN PAGINA USUARIOS -->
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php echo form_open('');?>
                    <div class="form-group mt-4">                        
                        <?php
                            echo form_label('Documento', 'documento');

                            $data = [
                                'name'      => 'documento',
                                'type'      => 'number',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                            ?>
                    </div>
                    <div class="form-group mt-4">                        
                        <?php
                            echo form_label('Nombres', 'nombres');

                            $data = [
                                'name'      => '',
                                'type'      => 'number',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                            ?>
                    </div>
                    <div class="form-group">                        
                        <?php
                            echo form_label('Contrasena', 'contrasena');

                            $data = [
                                'name'      => 'contrasena',
                                'type'      => 'password',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                            ?>
                    </div>
                    <div class="form-group">                        
                        <?php
                            echo form_label('Correo', 'correo');

                            $data = [
                                'name'      => 'correo',
                                'type'      => 'text',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                        ?>
                    </div>

                    <?php echo form_submit('mysubmit', 'Enviar','class="btn btn-primary mt-4"');?> 

                <?php echo form_close();?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
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