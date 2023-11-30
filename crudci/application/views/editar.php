<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <h1>Editar producto</h1>

    <form action="/productos/guardar" method="post">
        <input type="hidden" name="id" value="{{ $producto->id }}">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="number" name="costo" id="costo" class="form-control" value="{{ $producto->costo }}">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $producto->cantidad }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

</div>

</body>
</html>
