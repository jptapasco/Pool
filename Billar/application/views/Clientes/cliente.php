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
                    <button type="button" class="btn btn-success" href="" data-bs-toggle="modal" data-bs-target="#modalAgregarCliente">Agregar</button>
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
                                <th></th>
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
                                    <th>
                                        <button type="button" class="btn btn-warning" href="" data-bs-toggle="modal" data-bs-target="#modalEditarCliente<?php echo $cliente->id_cliente ?>">Editar</button>
                                    </th>
                                </tr>
                               <!-- Modal para Editar cliente  -->
                                <div class="modal fade" id="modalEditarCliente<?php echo $cliente->id_cliente ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">  
                                                <h3 class="modal-title fs-5" id="">Editar Cliente</h3>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open('Clientes/editar/'.$cliente->id_cliente);?>
                                                    <div class="form-group mt-4">
                                                        <label for="basic-url" class="form-label text-info">Documento</label>
                                                        <?php
                                                            $data = [
                                                                'name'      => 'documento',
                                                                'value'     => $cliente->documento,
                                                                'class'     => 'form-control input-lg border border-info', 
                                                            ];
                                                            echo form_input($data);
                                                        ?>
                                                    </div>  
                                                    <div class="form-group mt-4">
                                                        <label for="basic-url" class="form-label text-info">Nombe y Apellido</label>
                                                        <?php
                                                            $data = [
                                                                'name'      => 'nombres',
                                                                'value'     => $cliente->nombres,
                                                                'class'     => 'form-control input-lg border border-info', 
                                                            ];
                                                            echo form_input($data);
                                                        ?>
                                                    </div>  
                                                    <div class="form-group mt-4">
                                                        <label for="basic-url" class="form-label text-info">Teléfono</label>
                                                        <?php
                                                            $data = [
                                                                'name'      => 'telefono',
                                                                'value'     => $cliente->telefono,
                                                                'class'     => 'form-control input-lg border border-info', 
                                                            ];
                                                            echo form_input($data);
                                                        ?>
                                                    </div>                 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mx-3" data-bs-dismiss="modal">Cancelar</button>
                                                    <?php echo form_submit('mysubmit', 'Actualizar','class="btn btn-primary"');?> 
                                                </div>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para agregar  -->
                                <div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">  
                                                <h3 class="modal-title fs-5" id="">Agregar Cliente</h3>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open('Clientes/agregar');?>
                                                    <div class="form-group mt-4">
                                                        <label for="basic-url" class="form-label text-info">Documento</label>
                                                        <?php
                                                            $data = [
                                                                'name'      => 'documento',
                                                                'value'     => '',
                                                                'class'     => 'form-control input-lg border border-info', 
                                                            ];
                                                            echo form_input($data);
                                                        ?>
                                                    </div>  
                                                    <div class="form-group mt-4">
                                                        <label for="basic-url" class="form-label text-info">Nombe y Apellido</label>
                                                        <?php
                                                            $data = [
                                                                'name'      => 'nombres',
                                                                'value'     => '',
                                                                'class'     => 'form-control input-lg border border-info', 
                                                            ];
                                                            echo form_input($data);
                                                        ?>
                                                    </div>  
                                                    <div class="form-group mt-4">
                                                        <label for="basic-url" class="form-label text-info">Teléfono</label>
                                                        <?php
                                                            $data = [
                                                                'name'      => 'telefono',
                                                                'value'     => '',
                                                                'class'     => 'form-control input-lg border border-info', 
                                                            ];
                                                            echo form_input($data);
                                                        ?>
                                                    </div>                 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mx-3" data-bs-dismiss="modal">Cerrar</button>
                                                    <?php echo form_submit('mysubmit', 'Agregar','class="btn btn-primary"');?> 
                                                </div>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                 <!-- Modal para agregar  -->
                 <div class="modal fade" id="modalEditarCliente<?php echo $cliente->id_cliente ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">  
                                            <h3 class="modal-title fs-5" id="">Modificar Cantidad Del Producto</h3>
                                        </div>
                                            <div class="modal-body">
                                                <p style="padding-inline: inherit">Nombre: <span class="p-3"><?php echo $cliente->nombres ?></span></p>
                                            </div>
                                            <div class="modal-body d-flex">
                                                <p style="padding-inline: inherit">Cantidad: </p>
                                                <input type="number" class="form-control col-6" name="" id="cantidadAgregada">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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