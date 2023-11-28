<?php $this->load->view('header'); ?>

<div class="container">
    <h2>Lista de Productos</h2>

    <!-- Barra de búsqueda -->
    <form method="post" action="<?php echo base_url('productos/buscar'); ?>">
        <div class="input-group">
            <input type="text" class="form-control" name="termino" placeholder="Buscar por nombre o descripción">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Buscar</button>
            </span>
        </div>
    </form>

    <br>
    <a href="<?php echo base_url('productos/agregar'); ?>" class="btn btn-primary">Agregar Producto</a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto->id; ?></td>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->descripcion; ?></td>
                    <td><?php echo $producto->costo; ?></td>
                    <td><?php echo $producto->precio; ?></td>
                    <td><?php echo $producto->cantidad; ?></td>
                    <td>
                        <a href="<?php echo base_url('productos/editar/' . $producto->id); ?>" class="btn btn-warning">Editar</a>
                        <a href="<?php echo base_url('productos/eliminar/' . $producto->id); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('footer'); ?>
