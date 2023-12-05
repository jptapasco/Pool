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

        <h1 class="text-center mt-3">FACTURA</h1>
        <div class="container">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Cantidad a llevar</th>
                        <th scope="col">subtotal</th>
                    </tr>
                </thead>
                <!-- ... -->
                <?php if (!empty($ventas)) : ?>
                    <tbody>
                        <?php foreach ($ventas as $key => $venta) : ?>
                            <tr>
                                <td><?php echo $venta['nombre']; ?></td>
                                <td><?php echo $venta['valor']; ?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="updateQuantity(<?php echo $key; ?>, -1, <?php echo $venta['valor']; ?>)">-</button>
                                    <span id="cantidad_<?php echo $key; ?>"><?php echo $venta['cantidad']; ?></span>
                                    <button class="btn btn-primary" onclick="updateQuantity(<?php echo $key; ?>, 1, <?php echo $venta['valor']; ?>)">+</button>
                                </td>
                                <td id="subtotal_<?php echo $key; ?>"><?php echo $venta['cantidad'] * $venta['valor']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
                <!-- ... -->

            </table>
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
        function updateQuantity(index, change, value) {
            // Obtener la celda de cantidad y subtotal
            var quantityCell = document.getElementById("cantidad_" + index);
            var subtotalCell = document.getElementById("subtotal_" + index);

            // Obtener la cantidad actual
            var currentQuantity = parseInt(quantityCell.innerHTML);

            // Calcular la nueva cantidad
            var newQuantity = currentQuantity + change;
            if (newQuantity <= 0) {
                newQuantity = 1;
            }

            // Actualizar la cantidad en la celda de cantidad
            quantityCell.innerHTML = newQuantity;

            // Actualizar el subtotal específico de la fila
            var newSubtotal = newQuantity * value;
            subtotalCell.innerHTML = newSubtotal;
        }
    </script>

</body>

</html>