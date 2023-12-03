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
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAlcoholicos" aria-expanded="false" aria-controls="collapseAlcoholicos">
                            Productos Alcohólicos
                        </button>
                    </h2>
                    <div id="collapseAlcoholicos" class="accordion-collapse collapse" data-bs-parent="#collapseAlcoholicos">
                        <div class="accordion-body">
                            <?php if (!empty($respuesta_productos_alcoholicos)) : ?>
                                <?php foreach ($respuesta_productos_alcoholicos as $producto_a) : ?>
                                    <!-- Card Markup for Productos Alcohólicos -->
                                    <div class="col-md-4 mb-3">
                                        <div class="card producto-card" data-nombre="<?php echo $producto_a->nombre; ?>" data-valor="<?php echo $producto_a->valor_venta; ?>" data-cantidad="<?php echo $producto_a->cantidad; ?>" style="width: 18rem;">
                                            <a href="#">
                                                <img src="https://www.cocinacaserayfacil.net/wp-content/uploads/2020/03/Platos-de-comida-que-pides-a-domicilio-y-puedes-hacer-en-casa.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-text text-center"><?php echo $producto_a->nombre; ?></h5>
                                                    <h5 class="card-text text-center"><?php echo $producto_a->valor_venta; ?></h5>
                                                    <h5 class="card-text text-center">Cantidad disponible: <?php echo $producto_a->cantidad; ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Accordion Item for Otras Categorías (No Alcohólicas, Comida, Snacks) -->
                <!-- Puedes replicar este bloque para cada categoría y ajustar los nombres de las funciones y variables según sea necesario -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNoAlcoholicas" aria-expanded="false" aria-controls="collapseNoAlcoholicas">
                            Productos No Alcohólicos
                        </button>
                    </h2>
                    <div id="collapseNoAlcoholicas" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php if (!empty($respuesta_productos_no_alcoholicos)) : ?>
                                <?php foreach ($respuesta_productos_no_alcoholicos as $producto_na) : ?>
                                    <!-- Card Markup for No Alcohólicas -->
                                    <div class="col-md-4 mb-3">
                                        <!-- Card Markup for Productos No Alcohólicos -->
                                        <div class="card producto-card" data-nombre="<?php echo $producto_na->nombre; ?>" data-valor="<?php echo $producto_na->valor_venta; ?>" data-cantidad="<?php echo $producto_na->cantidad; ?>" style="width: 18rem;">
                                            <a href="#">
                                                <img src="https://www.cocinacaserayfacil.net/wp-content/uploads/2020/03/Platos-de-comida-que-pides-a-domicilio-y-puedes-hacer-en-casa.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-text text-center"><?php echo $producto_na->nombre; ?></h5>
                                                    <h5 class="card-text text-center"><?php echo $producto_na->valor_venta; ?></h5>
                                                    <h5 class="card-text text-center">Cantidad disponible: <?php echo $producto_na->cantidad; ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Cantidad a llevar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="tabla-ventas"></tbody>
            </table>

            <!-- Botón para eliminar todos los elementos de la tabla -->
            <button id="btnEliminarTodo" class="btn btn-danger mt-3">Eliminar Todo</button>
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

    <!-- ... (código anterior) ... -->

</body>

</html>