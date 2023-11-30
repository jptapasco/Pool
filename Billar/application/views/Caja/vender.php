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
        <h1 class="text-center mt-3">Venta de productos</h1>
        <div class="container">
            <?php echo form_open('productos/obtenerPorCategoria'); ?>
            <div class="row mt-4">
                <div class="col-6">
                    <?php
                        echo form_label('Elije la categoria del producto', '');

                        $options = array(
                            ''                  => 'Categoria',                            
                            'alcoholicas'       => 'alcoholicas',
                            'no_alcoholicas'    => 'no_alcoholicas',
                            'comida'            => 'comida',
                            'snacks'            => 'snacks',
                        );

                        $attributes = 'class="form-control input-lg border border-info"';
                        echo form_dropdown('categoria', $options, '', $attributes);
                    ?>
                </div>
                <div class="col-6 d-flex align-items-end">
                    <button class="btn btn-primary" type="submit">Obtener Productos</button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <div class=" mt-4">
                <?php if (!empty($respuesta_productos)):                     
                    ?>           
                    <?php foreach ($respuesta_productos as $producto): ?>
                        <div class="card" style="width: 18rem;">
                            <img src="https://www.cocinacaserayfacil.net/wp-content/uploads/2020/03/Platos-de-comida-que-pides-a-domicilio-y-puedes-hacer-en-casa.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto->nombre; ?></h5>
                                <p class="card-text">$ <?php echo $producto->valor_venta; ?></p>
                                <a href="#" class="btn btn-primary">cantidad: <?php echo $producto->cantidad; ?></a>
                            </div>
                        </div>     
                        <br>
                    <?php endforeach; ?>
                <?php endif; ?>
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
    <!-- Buscar -->
    <script src="<?php echo base_url() ?>/assets/dist/js/buscar.js"></script>
</body>
</html>