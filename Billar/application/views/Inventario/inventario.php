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
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio compra</th>
                        <th scope="col">PVP</th>
                        <th scope="col">Unidad Medida</th>
                        <th scope="col">Punto Reorden</th>    
                        <th scope="col">Stock</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Agregar Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $key => $Inventario) : ?>
                        <tr>
                            <th> <?php echo $Inventario->nombre ?> </th>
                            <th> <?php echo $Inventario->observaciones ?> </th>
                            <th> <?php echo $Inventario->precio_compra ?> </th>
                            <th> <?php echo $Inventario->valor_venta ?> </th>
                            <th> <?php echo $Inventario->unidad_medida ?> </th>
                            <th> <?php echo $Inventario->punto_reorden ?> </th>
                            <th> <?php echo $Inventario->cantidad ?> </th>
                            <th> <?php echo $Inventario->created_at ?> </th>
                            <th>
                                <button type="button" class="btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#modalModificarCantidad<?php echo $Inventario->id_producto ?>">Modificar</button>
                            </th>
                        </tr>
                        <!-- Modal para agregar  -->
                        <div class="modal fade" id="modalModificarCantidad<?php echo $Inventario->id_producto ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">  
                                    <h3 class="modal-title fs-5" id="">Modificar Cantidad Del Producto</h3>
                                </div>
                                    <?php echo form_open('Inventario/agregarCantidad/'.$Inventario->id_producto);?>
                                        <div class="modal-body">
                                            <p style="padding-inline: inherit">Nombre: <span class="p-3"><?php echo $Inventario->nombre ?></span></p>
                                        </div>
                                        <div class="modal-body d-flex">
                                            <p style="padding-inline: inherit">Cantidad: </p>
                                            <?php
                                                $data = [
                                                    'name'      => 'cantidadNueva',
                                                    'value'     => '',
                                                    'type'      => 'number',
                                                    'class'     => 'form-control input-lg border border-info col-8', 
                                                ];
                                                echo form_input($data);
                                            ?>
                                             <?php
                                                $data = [
                                                    'name'      => 'cantidad',
                                                    'value'     => $Inventario->cantidad,
                                                    'type'      => 'hidden'
                                                ];
                                                echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <?php echo form_submit('mysubmit', 'Agregar','class="btn btn-primary mx-3"');?> 
                                        </div>
                                    <?php echo form_close();?>
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