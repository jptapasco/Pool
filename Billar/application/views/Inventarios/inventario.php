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
        <!-- PAGINA INVENTARIO -->
        <div class="container">
            <h1 class="text-center mt-3">Inventario</h1>

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
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Unidad Medida</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Punto de Reorden</th>
                        <th scope="col">Valor Compra</th>
                        <th scope="col">Valor Venta</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($respuesta as $key => $Inventario) : ?>
                        <tr>
                            <th> <?php echo $Inventario->nombre_producto ?> </th>
                            <th> <?php echo $Inventario->categoria_producto ?> </th>
                            <th> <?php echo $Inventario->unidad_medida ?> </th>
                            <th> <?php echo $Inventario->cantidad ?> </th>
                            <th> <?php echo $Inventario->punto_reorden ?> </th>
                            <th> <?php echo $Inventario->valor_compra ?> </th>
                            <th> <?php echo $Inventario->valor_venta ?> </th>
                            <th>
                                <a href="#" class="btn btn-info" onclick="verObservacion('<?php echo $Inventario->nombre_producto ?>', '<?php echo $Inventario->observaciones ?>')">Ver</a>
                            </th>
                            <th>
                                <a href="#" class="btn btn-info" onclick="editarInventario(<?php echo $Inventario->id_inventario ?>)" data-bs-toggle="modal" data-bs-target="#modalEditar" data-id="<?php echo $Inventario->id_inventario ?>">Editar</a>
                                <a href="#" class="btn btn-danger" onclick="eliminarInventario(<?php echo $Inventario->id_inventario ?>)">Eliminar</a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- FIN PAGINA USUARIOS -->
    </div>



    <!-- Modal agregar -->
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
                            echo form_label('Id_inventario', 'id_inventario');

                            $data = [
                                'name'      => 'id_inventario',
                                'type'      => 'number',
                                'value'     => '',
                                'class'     => 'form-control input-lg border border-info', 
                            ];
                            echo form_input($data);
                            ?>
                    </div>
                    <div class="form-group mt-4">                        
                        <?php
                            echo form_label('Id_producto', 'id_producto');

                            $data = [
                                'name'      => 'id_producto',
                                'type'      => 'number',
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

    <!-- Modal editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Inventario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('');?>
                        <div class="form-group mt-4">
                            <?php
                                echo form_label('Id_inventario', 'id_inventario');

                                $data = [
                                    'name'      => 'id_inventario',
                                    'type'      => 'number',
                                    'value'     => '', // Aquí deberías obtener el valor actual del inventario
                                    'class'     => 'form-control input-lg border border-info', 
                                ];
                                echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group mt-4">
                            <?php
                                echo form_label('Id_producto', 'id_producto');

                                $data = [
                                    'name'      => 'id_producto',
                                    'type'      => 'number',
                                    'value'     => '', // Aquí deberías obtener el valor actual del producto
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
                    <button type="button" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para ver la observación -->
    <div class="modal fade" id="modalVerObservacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTituloObservacion">Observación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p id="observacionTexto"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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

        function editarInventario(idInventario) {
            var datosActuales = {
                id_inventario: idInventario,
            };

            document.getElementById('id_inventario').value = datosActuales.id_inventario;

            $('#modalEditar').modal('show');
        }
        function verObservacion(nombreProducto, observacion) {
            document.getElementById('modalTituloObservacion').innerText = 'Observación - ' + nombreProducto;
            document.getElementById('observacionTexto').innerText = observacion;

            $('#modalVerObservacion').modal('show');
        }
    </script>
</body>

</html>