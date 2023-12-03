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
            <?php echo form_open('productos/obtenerPorCategoria', 'id="categoriaForm"'); ?>
            <div class="row mt-4">
                <div class="col-12">
                    <?php
                        echo form_label('Elije la categoria del producto:', '');

                        $options = array(
                            ''                  => 'Categoria',                            
                            'alcoholicas'       => 'Alcoholicas',
                            'no_alcoholicas'    => 'No Alcoholicas',
                            'comida'            => 'Comida',
                            'snacks'            => 'Snacks',
                        );

                        $attributes = 'class="form-control input-lg border border-info"';
                        echo form_dropdown('categoria', $options, '', $attributes);
                    ?>
                </div>
            </div>
            <?php echo form_close(); ?>
            <div class="row mt-3">
                <?php if (!empty($respuesta_productos)): ?>
                    <?php foreach ($respuesta_productos as $producto): ?>
                        <div class="col-md-4 mb-3"> <!-- Utiliza la clase 'mb-3' para agregar margen inferior -->
                            <div class="card producto-card" data-nombre="<?php echo $producto->nombre; ?>" data-valor="<?php echo $producto->valor_venta; ?>" data-cantidad="<?php echo $producto->cantidad; ?>" style="width: 18rem;">
                                <a href="#">
                                    <img src="https://www.cocinacaserayfacil.net/wp-content/uploads/2020/03/Platos-de-comida-que-pides-a-domicilio-y-puedes-hacer-en-casa.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-text text-center"><?php echo $producto->nombre; ?></h5>
                                        <h5 class="card-text text-center"><?php echo $producto->valor_venta; ?></h5>
                                        <h5 class="card-text text-center">Cantidad disponible: <?php echo $producto->cantidad; ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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
                <tbody id="tabla-ventas">

                </tbody>
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
    <script>
        document.getElementById('categoriaForm').addEventListener('change', function () {
            var form = document.getElementById('categoriaForm');
            if (form) {
                form.submit();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Recuperar la información almacenada en el almacenamiento local al cargar la página
            var ventasGuardadas = JSON.parse(localStorage.getItem('ventas')) || [];
            var tablaVentas = document.getElementById('tabla-ventas');
            let cantidad_llevar = parseInt("1", 10);

            // Función para eliminar una fila al hacer clic en el botón "Cancelar"
            function eliminarFila(fila, nombre) {
                fila.remove();
                // Actualizar la información en el almacenamiento local después de eliminar la fila
                var ventasActualizadas = JSON.parse(localStorage.getItem('ventas')) || [];
                var nuevaListaVentas = ventasActualizadas.filter(function(venta) {
                    return venta.nombre !== nombre;
                });
                localStorage.setItem('ventas', JSON.stringify(nuevaListaVentas));
            }

            // Función para eliminar todas las filas y reiniciar el almacenamiento local
            function cancelarTodo() {
                while (tablaVentas.firstChild) {
                    tablaVentas.removeChild(tablaVentas.firstChild);
                }
                localStorage.removeItem('ventas');
            }

            // Función para agregar un producto a la tabla
            function agregarProducto(nombre, valor, cantidad) {
                // Verificar si el producto ya está en la tabla
                var filaExistente = Array.from(tablaVentas.children).find(function(fila) {
                    return fila.querySelector('td:first-child').innerText === nombre;
                });

                if (filaExistente) {
                    // Si el producto ya está en la tabla, actualizar la cantidad
                    cantidad = parseInt(filaExistente.querySelector('td:last-child').innerText, 10) + cantidad;
                    filaExistente.querySelector('td:last-child').innerText = cantidad;
                    // Actualizar la información en el almacenamiento local
                    actualizarLocalStorage();
                    return;
                }

                // Botón "Cancelar" en cada fila de la tabla de ventas
                var btnCancelar = document.createElement('button');
                btnCancelar.innerText = 'Cancelar';
                btnCancelar.classList.add('btn', 'btn-danger', 'btn-sm');
                btnCancelar.addEventListener('click', function() {
                    eliminarFila(fila, nombre);
                });

                // Botones de incremento y decremento
                var btnIncrementar = document.createElement('button');
                btnIncrementar.innerText = '+';
                btnIncrementar.classList.add('btn', 'btn-success', 'btn-sm', 'mx-1');
                btnIncrementar.addEventListener('click', function() {
                    cantidad++;
                    actualizarCantidad();
                });

                var btnDecrementar = document.createElement('button');
                btnDecrementar.innerText = '-';
                btnDecrementar.classList.add('btn', 'btn-warning', 'btn-sm', 'mx-1');
                btnDecrementar.addEventListener('click', function() {
                    if (cantidad > 1) {
                        cantidad--;
                        actualizarCantidad();
                    }
                });

                // Función para actualizar la cantidad en la fila
                function actualizarCantidad() {
                    cantidadCell.innerText = cantidad;
                    // Actualizar la información en el almacenamiento local
                    actualizarLocalStorage();
                }

                // Añadir los botones de incremento y decremento a la fila
                var fila = document.createElement('tr');
                fila.innerHTML = '<td>' + nombre + '</td><td>' + valor + '</td><td>' + cantidad + '</td>';
                var cantidadCell = fila.querySelector('td:last-child');
                fila.appendChild(document.createElement('td').appendChild(btnIncrementar));
                fila.appendChild(document.createElement('td').appendChild(btnDecrementar));
                fila.appendChild(document.createElement('td').appendChild(btnCancelar));
                tablaVentas.appendChild(fila);

                // Almacenar la información actualizada en el almacenamiento local
                function actualizarLocalStorage() {
                    var ventasActualizadas = JSON.parse(localStorage.getItem('ventas')) || [];
                    ventasActualizadas.push({
                        nombre: nombre,
                        valor: valor,
                        cantidad: cantidad
                    });
                    localStorage.setItem('ventas', JSON.stringify(ventasActualizadas));
                }

                actualizarLocalStorage();
            }

            var tarjetasProductos = document.querySelectorAll('.producto-card');

            tarjetasProductos.forEach(function(tarjeta) {
                tarjeta.addEventListener('click', function() {
                    var nombre = tarjeta.getAttribute('data-nombre');
                    var valor = tarjeta.getAttribute('data-valor');
                    var cantidad = cantidad_llevar;

                    // Llamar a la función para agregar el producto
                    agregarProducto(nombre, valor, cantidad);
                });
            });

            // Agregar las ventas guardadas a la tabla al cargar la página
            ventasGuardadas.forEach(function(venta) {
                agregarProducto(venta.nombre, venta.valor, cantidad_llevar);
            });

            // Evento para el botón "Cancelar Todo"
            var btnCancelarTodo = document.getElementById('btnCancelarTodo');
            btnCancelarTodo.addEventListener('click', function() {
                cancelarTodo();
            });
        });
    </script>




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
