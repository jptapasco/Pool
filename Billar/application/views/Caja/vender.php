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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Tu menú aquí -->
        <?php $this->load->view('Menu/menu'); ?>
        <h1 class="text-center mt-3">Venta de productos</h1>
        <div class="container">
            <!-- Formulario para elegir categoría -->
            <?php echo form_open('productos/obtenerPorCategoria', 'id="categoriaForm"'); ?>
            <div class="row mt-4">
                <div class="col-12">
                    <?php
                    echo form_label('Elije la categoría del producto:', '');

                    $options = array(
                        ''         => 'Categoría',
                        'alcoholicas'    => 'Alcoholicas',
                        'no_alcoholicas'  => 'No Alcoholicas',
                        'comida'      => 'Comida',
                        'snacks'      => 'Snacks',
                    );

                    $attributes = 'class="form-control input-lg border border-info"';
                    echo form_dropdown('categoria', $options, '', $attributes);
                    ?>
                </div>
            </div>
            <?php echo form_close(); ?>

            <!-- Tarjetas de productos -->
            <div class="row mt-3" id="tarjetas-productos">
                <?php if (!empty($respuesta_productos)) : ?>
                    <?php foreach ($respuesta_productos as $producto) : ?>
                        <div class="col-md-4 mb-3 <?php echo $producto->categoria; ?>">
                            <div class="card producto-card" data-nombre="<?php echo $producto->nombre; ?>" data-valor="<?php echo $producto->valor_venta; ?>" data-cantidad="<?php echo $producto->cantidad; ?>" style="width: 18rem;">
                                <a href="#">
                                    <img src="https://www.cocinacaserayfacil.net/wp-content/uploads/2020/03/Platos-de-comida-que-pides-a-domicilio-y-puedes-hacer-en-casa.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-text text-center"><?php echo $producto->nombre; ?></h5>
                                        <h5 class="card-text text-center"><?php echo $producto->valor_venta; ?></h5>
                                        <h5 class="card-text text-center">Cantidad disponible:
                                            <?php echo $producto->cantidad; ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Botón para eliminar todos los elementos de la tabla -->
            <button id="btnEliminarTodo" class="btn btn-danger mt-3">Eliminar Todo</button>

            <!-- Tabla de ventas -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Cantidad a llevar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="tabla-ventas">

                </tbody>
            </table>

            <!-- Formulario de facturación -->
            <form id="formFacturar" action="<?php echo site_url('Factura/indexFactura'); ?>" method="post">
                <input type="hidden" id="inputVentas" name="ventas" value="">
            </form>

            <!-- Botón de facturación -->
            <button id="btnFacturar" class="btn btn-primary">
                Facturar
            </button>
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
    
    <script>
        document.getElementById('categoriaForm').addEventListener('change', function() {
            var form = document.getElementById('categoriaForm');
            if (form) {
                form.submit();
            }
        });
        $(document).ready(function() {
            var tablaVentas = $('#tabla-ventas');

            function agregarProducto(nombre, valor, cantidad, categoria) {
                var filaExistente = tablaVentas.find('tr[data-categoria="' + categoria + '"][data-nombre="' + nombre + '"]');

                if (filaExistente.length > 0) {
                    var cantidadExistente = parseInt(filaExistente.find('td:eq(2)').text(), 10);
                    filaExistente.find('td:eq(2)').text(cantidadExistente + cantidad);
                    actualizarFormulario();
                } else {
                    var fila = $('<tr data-categoria="' + categoria + '" data-nombre="' + nombre + '">');
                    fila.append('<td>' + nombre + '</td>');
                    fila.append('<td>' + valor + '</td>');
                    fila.append('<td>' + cantidad + '</td>');
                    fila.append('<td><button class="btn btn-danger btn-sm btnCancelar">Cancelar</button></td>');

                    tablaVentas.append(fila);
                    actualizarFormulario();
                }
            }

            tablaVentas.on('click', '.btnCancelar', function() {
                $(this).closest('tr').remove();
                actualizarFormulario();
            });

            function actualizarFormulario() {
                var ventas = [];
                tablaVentas.find('tr').each(function() {
                    var fila = $(this);
                    var nombre = fila.data('nombre');
                    var valor = fila.find('td:eq(1)').text();
                    var cantidad = fila.find('td:eq(2)').text();
                    var categoria = fila.data('categoria');

                    ventas.push({
                        nombre: nombre,
                        valor: valor,
                        cantidad: cantidad,
                        categoria: categoria
                    });
                });

                $('#inputVentas').val(JSON.stringify(ventas));
            }

            var tarjetasProductos = $('.producto-card');

            tarjetasProductos.on('click', function() {
                var nombre = $(this).data('nombre');
                var valor = $(this).data('valor');
                var cantidad = 1; // Puedes cambiar esto según tus necesidades
                var categoria = document.querySelector('select[name="categoria"]').value;

                agregarProducto(nombre, valor, cantidad, categoria);
            });

            var btnFacturar = $('#btnFacturar');

            btnFacturar.on('click', function() {
                var ventas = JSON.parse($('#inputVentas').val()) || [];

                console.log('Datos que se van a enviar:', ventas);

                setTimeout(function() {
                    console.log('Datos que se están enviando:', $('#inputVentas').val());
                    $('#formFacturar').submit();
                }, 0);
            });

            var btnEliminarTodo = $('#btnEliminarTodo');

            btnEliminarTodo.on('click', function() {
                tablaVentas.empty();
                actualizarFormulario();
            });

            $('#categoriaForm').on('change', function() {
                var categoriaSeleccionada = $(this).find('select[name="categoria"]').val();

                // Ocultar todas las tarjetas
                $('.producto-card').hide();

                // Mostrar solo las tarjetas de la categoría seleccionada
                $('.' + categoriaSeleccionada).show();

                // Limpiar la tabla actual
                tablaVentas.empty();

                // Agregar las ventas guardadas de la categoría actual a la tabla
                var ventasGuardadasPorCategoria = obtenerVentasGuardadasPorCategoria(categoriaSeleccionada);
                ventasGuardadasPorCategoria.forEach(function(venta) {
                    agregarProducto(venta.nombre, venta.valor, venta.cantidad, categoriaSeleccionada);
                });
            });

            function obtenerVentasGuardadasPorCategoria(categoria) {
                var ventasGuardadas = JSON.parse(localStorage.getItem('ventas')) || [];
                return ventasGuardadas.filter(function(venta) {
                    return venta.categoria === categoria;
                });
            }
        });
    </script>
</body>

</html>