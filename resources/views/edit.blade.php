<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Producto - Tienda de Celulares</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #F2F1EF;
      color: #3A3A3A;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 80px auto;
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      color: #4A90E2;
      margin-bottom: 1.5rem;
    }
    form label {
      display: block;
      font-weight: 600;
      margin-top: 1rem;
    }
    form input, form textarea, form select {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.4rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .btn-container {
      display: flex;
      justify-content: space-between;
      margin-top: 1.5rem;
    }
    .btn {
      background-color: #4A90E2;
      color: white;
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 4px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #357ABD;
    }
    .btn-cancelar {
      background-color: #9B9B9B;
    }
    .btn-cancelar:hover {
      background-color: #777;
    }
    .imagen-actual {
      text-align: center;
      margin-top: 1rem;
    }
    .imagen-actual img {
      max-width: 100%;
      border-radius: 6px;
      margin-top: 0.5rem;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="nombre">Nombre del producto</label>
        <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
      </div>

      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" value="{{ $producto->precio }}" required>
      </div>

      <div class="form-group">
        <label for="color">Color</label>
        <input type="text" id="color" name="color" value="{{ $producto->color }}" required>
      </div>

      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" value="{{ $producto->stock }}" required>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
      </div>

      <div class="form-group">
        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
          <option value="Activo" {{ $producto->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
          <option value="Inactivo" {{ $producto->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
      </div>

      <div class="form-group">
        <label for="imagen">Imagen del producto</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">

        @if($producto->imagen)
          <div class="imagen-actual">
            <p>Imagen actual:</p>
            <img src="{{ asset('imagenes_productos/' . $producto->imagen) }}" alt="Imagen actual del producto">
          </div>
        @endif
      </div>

      
      <div class="btn-container">
        <button type="submit" class="btn">Guardar cambios</button>
        <a href="{{ route('pagina_principal') }}" class="btn btn-cancelar">Cancelar</a>

      </div>
    </form>
  </div>

</body>
</html>
