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
                No se encontraron resultados.
            </div>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">ROL</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($respuesta as $key => $Usuario) : ?>
                        <tr>
                            <th scope="row"> <?php echo $Usuario->rol ?> </th>
                            <th> <?php echo $Usuario->documento ?> </th>
                            <th> <?php echo $Usuario->nombres ?> </th>
                            <th> <?php echo $Usuario->correo ?> </th>
                            <th> <?php echo $Usuario->telefono ?> </th>
                            <th>
                                <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo $Usuario->id_usuario ?>">Editar</button>
                            </th>
                        </tr>

                        <!--MODAL EDITAR-->
                        <div class="modal fade" id="modalEditar<?php echo $Usuario->id_usuario ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Datos de <?php echo $Usuario->nombres ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open('Usuarios/guardar/'.$Usuario->id_usuario);?>
                                        <div class="form-group mt-4">
                                            <label for="basic-url" class="form-label text-info">Rol</label>
                                            <?php
                                                echo form_label('', '');

                                                $data = [
                                                    'name'      => 'rol',
                                                    'value'     => $Usuario->rol ,
                                                    'class'     => 'form-control input-lg border border-danger', 
                                                    'readonly'  => 'readonly',
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>  
                                        <div class="form-group mt-4">
                                            <label for="basic-url" class="form-label text-info">Documento</label>
                                            <?php
                                                echo form_label('', '');

                                                $data = [
                                                    'name'      => 'documento',
                                                    'value'     => $Usuario->documento ,
                                                    'class'     => 'form-control input-lg border border-danger', 
                                                    'readonly'  => 'readonly',
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>  
                                        <div class="form-group mt-4">
                                            <label for="basic-url" class="form-label text-info">Nombre</label>
                                            <?php
                                                echo form_label('', '');

                                                $data = [
                                                    'name'      => 'nombres',
                                                    'value'     => $Usuario->nombres ,
                                                    'class'     => 'form-control input-lg border border-info', 
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="basic-url" class="form-label text-info">Correo electronico</label>
                                            <?php
                                                echo form_label('', '');

                                                $data = [
                                                    'name'      => 'correo',
                                                    'type'      => 'email',
                                                    'value'     => $Usuario->correo,
                                                    'class'     => 'form-control input-lg border border-info', 
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="basic-url" class="form-label text-info">Telefono</label>
                                            <?php
                                                echo form_label('', '');

                                                $data = [
                                                    'name'      => 'telefono',
                                                    'type'      => 'number',
                                                    'value'     => $Usuario->telefono,
                                                    'class'     => 'form-control input-lg border border-info', 
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="basic-url" class="form-label text-info">Contraseña</label>
                                            <?php
                                                echo form_label('', '');

                                                $data = [
                                                    'name'      => 'contrasena',
                                                    'type'      => 'password',
                                                    'value'     => $Usuario->contrasena,
                                                    'class'     => 'form-control input-lg border border-info', 
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>
                                        <?php echo form_submit('mysubmit', 'Editar','class="btn btn-primary mt-4"');?> 
                                    <?php echo form_close();?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN MODAL EDITAR-->
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- FIN PAGINA USUARIOS -->
    </div>

    <!-- MODAL AGREGAR -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php echo form_open('Usuarios/guardar');?>
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
                                'name'      => 'nombres',
                                'type'      => 'text',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                            ?>
                    </div>
                    <div class="form-group">                        
                        <?php
                            echo form_label('Telefono', 'telefono');

                            $data = [
                                'name'      => 'telefono',
                                'type'      => 'number',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                            ?>
                    </div>
                    <div class="form-group">                        
                    <?php
                        echo form_label('Rol', 'rol');

                        $options = array(
                            ''              => 'Seleccionar',                            
                            'cajero'        => 'cajero',
                            'mesera'        => 'mesera',
                        );

                        $attributes = 'class="form-control input-lg border border-info"';
                        echo form_dropdown('rol', $options, '', $attributes);
                        ?>
                    </div>
                    <div class="form-group mt-4">                        
                        <?php
                            echo form_label('Correo', 'correo');

                            $data = [
                                'name'      => 'correo',
                                'type'      => 'email',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group mt-4">                        
                        <?php
                            echo form_label('Contraseña', 'contrasena');

                            $data = [
                                'name'      => 'contrasena',
                                'type'      => 'password',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <?php echo form_submit('mysubmit', 'Agregar','class="btn btn-primary"');?> 
                </div>
                <?php echo form_close();?>                               
            </div>
        </div>
    </div>

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