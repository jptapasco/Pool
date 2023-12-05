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
            <h1 class="text-center mt-3">Productos</h1>

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
                        <th scope="col">Unidad medida</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Punto reorden</th>
                        <th scope="col">Precio compra</th>
                        <th scope="col">Precio venta</th>
                        <th scope="col">Fecha registro</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($respuesta as $key => $Producto) : ?>
                        <tr>
                            <th> <?php echo $Producto->nombre ?> </th>
                            <th> <?php echo $Producto->categoria ?> </th>
                            <th> <?php echo $Producto->unidad_medida ?> </th>
                            <th> <?php echo $Producto->cantidad?> </th>
                            <th> <?php echo $Producto->punto_reorden?> </th>
                            <th> <?php echo $Producto->precio_compra?> </th>
                            <th> <?php echo $Producto->valor_venta?> </th>
                            <th> <?php echo $Producto->created_at?> </th>
                            <th>
                                <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalverDescripcion<?php echo $Producto->id_producto ?>">Ver</button>
                            </th>
                            <th>
                                <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo $Producto->id_producto ?>">Editar</button>
                            </th>
                        </tr>

                        <!-- Modal para ver la observación -->
                        <div class="modal fade" id="modalverDescripcion<?php echo $Producto->id_producto ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTituloDescripcion">Descripción - <?php echo $Producto->nombre ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p id="descripcionTexto"><?php echo $Producto->observaciones ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar -->
                        <div class="modal fade" id="modalEditar<?php echo $Producto->id_producto ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open('Productos/guardar/'.$Producto->id_producto);?>
                                        <div class="row mt-4">
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Nombre', 'nombre');

                                                $data = [
                                                    'name'  => 'nombre',
                                                    'type'  => 'text',
                                                    'value' =>  $Producto->nombre,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-6">                        
                                                <?php
                                                    echo form_label('Categoría', 'categoria');

                                                    $options = array(
                                                        ''                  => 'Seleccionar',                            
                                                        'alcoholicas'       => 'alcoholicas',
                                                        'no_alcoholicas'    => 'no alcoholicas',
                                                        'snacks'            => 'snacks',
                                                        'comida'        => 'comida',
                                                    );                                                
                                                    $selectedCategoria = isset($Producto->categoria) ? $Producto->categoria : '';

                                                    $attributes = 'class="form-control input-lg border border-info"';
                                                    echo form_dropdown('categoria', $options, $selectedCategoria, $attributes);
                                                    ?>
                                            </div>
                                            <div class="form-group col-6">                        
                                                <?php
                                                    echo form_label('Unidad de medida', 'unidad_medida');

                                                    $options = array(
                                                        ''           => 'Seleccionar',                            
                                                        'unidad'     => 'unidad',
                                                        'paquete'    => 'paquete',
                                                        'canasta'    => 'canasta',
                                                    );                                                
                                                    $selectedMedida = isset($Producto->unidad_medida) ? $Producto->unidad_medida : '';

                                                    $attributes = 'class="form-control input-lg border border-info"';
                                                    echo form_dropdown('unidad_medida', $options, $selectedMedida, $attributes);
                                                    ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Cantidad', 'cantidad');

                                                $data = [
                                                    'name'  => 'cantidad',
                                                    'type'  => 'number',
                                                    'value' =>  $Producto->cantidad,
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
                                                    'type'  => 'number',
                                                    'value' =>  $Producto->punto_reorden,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Precio compra', 'precio_compra');

                                                $data = [
                                                    'name'  => 'precio_compra',
                                                    'type'  => 'number',
                                                    'value' =>  $Producto->precio_compra,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-6">
                                                <?php
                                                echo form_label('Valor venta', 'valor_venta');

                                                $data = [
                                                    'name'  => 'valor_venta',
                                                    'type'  => 'number',
                                                    'value' =>  $Producto->valor_venta,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-12">
                                                <?php
                                                echo form_label('Observaciones', 'observaciones');

                                                $data = [
                                                    'name'  => 'observaciones',
                                                    'type'  => 'text',
                                                    'value' =>  $Producto->observaciones,
                                                    'class' => 'form-control input-lg border border-info',
                                                ];
                                                echo form_input($data);
                                                ?>
                                            </div>
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



        <!-- Modal agregar productos-->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open('Productos/guardar');?>
                        <div class="row mt-4">
                            <div class="form-group col-6">
                                <?php
                                echo form_label('Nombre', 'nombre');

                                $data = [
                                    'name'  => 'nombre',
                                    'type'  => 'text',
                                    'value' => '',
                                    'class' => 'form-control input-lg border border-info',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="form-group col-6">                        
                                <?php
                                    echo form_label('Categoría', 'categoria');

                                    $options = array(
                                        ''                  => 'Seleccionar',                            
                                        'alcoholicas'       => 'alcoholicas',
                                        'no_alcoholicas'    => 'no alcoholicas',
                                        'snacks'            => 'snacks',
                                        'comida'        => 'comida',
                                    );

                                    $attributes = 'class="form-control input-lg border border-info"';
                                    echo form_dropdown('categoria', $options, '', $attributes);
                                    ?>
                            </div>
                        </div>
                        <!-- ESPACIO PARA DIV DE 'FECHA DE REGISTRO' -->

                        <div class="form-group mt-4">
                            <?php
                            echo form_label('Observaciones', 'observaciones');

                            $data = [
                                'name'  => 'observaciones',
                                'type'  => 'text',
                                'value' => '',
                                'class' => 'form-control input-lg border border-info',
                            ];
                            echo form_input($data);
                            ?>
                        </div>

                        <div class="form-group ">                        
                            <?php
                                echo form_label('Unidad de medida', 'unidad_medida');

                                $options = array(
                                    ''          => 'Seleccionar',                            
                                    'pack'      => 'pack',
                                    'canasta'   => 'canasta',
                                    'unidad'    => 'unidad',
                                );

                                $attributes = 'class="form-control input-lg border border-info"';
                                echo form_dropdown('unidad_medida', $options, '', $attributes);
                                ?>
                        </div>
                        <div class="row mt-4">
                            <div class="form-group col-6">
                                <?php
                                echo form_label('Cantidad', 'cantidad');

                                $data = [
                                    'name'  => 'cantidad',
                                    'type'  => 'number',
                                    'value' => '',
                                    'class' => 'form-control input-lg border border-info',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="form-group col-6">
                                <?php
                                echo form_label('Punto de reorden', 'punto_reorden');

                                $data = [
                                    'name'  => 'punto_reorden',
                                    'type'  => 'number',
                                    'value' => '',
                                    'class' => 'form-control input-lg border border-info',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-6">
                                <?php
                                echo form_label('Valor compra', 'precio_compra');

                                $data = [
                                    'name'  => 'precio_compra',
                                    'type'  => 'number',
                                    'value' => '',
                                    'class' => 'form-control input-lg border border-info',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="form-group col-6">
                                <?php
                                echo form_label('Valor venta', 'valor_venta');

                                $data = [
                                    'name'  => 'valor_venta',
                                    'type'  => 'number',
                                    'value' => '',
                                    'class' => 'form-control input-lg border border-info',
                                ];
                                echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <?php echo form_submit('mysubmit', 'Agregar','class="btn btn-primary"');?> 
                    </div>
                </div>
                <?php echo form_close();?>
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
    <!-- Buscar -->
    <script src="<?php echo base_url() ?>/assets/dist/js/buscar.js"></script>
</body>

</html>