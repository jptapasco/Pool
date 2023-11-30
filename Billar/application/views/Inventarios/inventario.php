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
                    <?php foreach ($respuesta_i as $key => $Inventario) : ?>
                        <tr>
                            <th> <?php echo $Inventario->nombre_producto ?> </th>
                            <th> <?php echo $Inventario->categoria_producto ?> </th>
                            <th> <?php echo $Inventario->unidad_medida ?> </th>
                            <th> <?php echo $Inventario->cantidad ?> </th>
                            <th> <?php echo $Inventario->punto_reorden ?> </th>
                            <th> <?php echo $Inventario->valor_compra ?> </th>
                            <th> <?php echo $Inventario->valor_venta ?> </th>
                            <th>
                                <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalverDescripcion<?php echo $Inventario->id_inventario ?>">Ver</button>
                            </th>
                            <th>
                                <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo $Inventario->id_inventario ?>">Editar</button>
                            </th>
                        </tr>

                        <!-- Modal para ver la observación -->
                        <div class="modal fade" id="modalverDescripcion<?php echo $Inventario->id_inventario ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTituloDescripcion">Descripción - <?php echo $Inventario->nombre_producto ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p id="descripcionTexto"><?php echo $Inventario->observaciones ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar -->
                        <div class="modal fade" id="modalEditar<?php echo $Inventario->id_inventario ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Inventario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open('Inventarios/guardar/'.$Inventario->id_inventario);?>
                                        <div class="form-group">                        
                                            <?php
                                            echo form_label('Unidad medida', 'unidad_medida');

                                            $options = array(
                                                ''          => 'Seleccionar',                            
                                                'pack'      => 'pack',
                                                'canasta'   => 'canasta',
                                                'unidad'    => 'unidad',
                                            );                                                
                                            $selectedCategoria = isset($Inventario->unidad_medida) ? $Inventario->unidad_medida : '';
                                            
                                            $attributes = 'class="form-control input-lg border border-info"';
                                            echo form_dropdown('unidad_medida', $options, $selectedCategoria, $attributes);
                                            ?>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Cantidad', 'cantidad');

                                                $data = [
                                                    'name'  => 'cantidad',
                                                    'type'  => 'text',
                                                    'value' =>  $Inventario->cantidad,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Punto reorden', 'punto_reorden');

                                                $data = [
                                                    'name'  => 'punto_reorden',
                                                    'type'  => 'text',
                                                    'value' =>  $Inventario->punto_reorden,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Valor compra', 'valor_compra');

                                                $data = [
                                                    'name'  => 'valor_compra',
                                                    'type'  => 'text',
                                                    'value' =>  $Inventario->valor_compra,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Valor compra', 'valor_venta');

                                                $data = [
                                                    'name'  => 'valor_venta',
                                                    'type'  => 'text',
                                                    'value' =>  $Inventario->valor_venta,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <?php
                                                echo form_label('Observaciones', 'observaciones');

                                                $data = [
                                                    'name'  => 'observaciones',
                                                    'type'  => 'text',
                                                    'value' =>  $Inventario->observaciones,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                    </div>                                    
                                    <div class="modal-footer">
                                        <?php echo form_submit('mysubmit', 'Editar','class="btn btn-primary mt-2"');?> 
                                    </div>
                                <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- FIN PAGINA USUARIOS -->
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
    <!-- Buscar -->
    <script src="<?php echo base_url() ?>/assets/dist/js/buscar.js"></script>
</body>

</html>