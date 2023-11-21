<?php $this->load->view('header'); ?>

<div class="container">
    <h2>Formulario de Producto</h2>
    <form method="post" action="<?php echo base_url('productos/' . (isset($producto) ? 'editar/' . $producto->id : 'agregar')); ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($producto) ? $producto->nombre : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo isset($producto) ? $producto->descripcion : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="costo">Costo:</label>
            <input type="text" class="form-control" id="costo" name="costo" value="<?php echo isset($producto) ? $producto->costo : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo isset($producto) ? $producto->precio : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo isset($producto) ? $producto->cantidad : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php $this->load->view('footer'); ?>
