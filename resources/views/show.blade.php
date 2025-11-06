<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Detalles del Producto</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #F2F1EF;
      margin: 0;
      padding: 2rem;
      color: #3A3A3A;
    }
    .container {
      background-color: white;
      border-radius: 10px;
      padding: 2rem;
      max-width: 600px;
      margin: 2rem auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 8px;
    }
    .actions {
      margin-top: 1.5rem;
      display: flex;
      justify-content: space-between;
    }
    a, button {
      text-decoration: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }
    .btn-edit {
      background-color: #4A90E2;
      color: white;
    }
    .btn-delete {
      background-color: #E74C3C;
      color: white;
      border: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>{{ $producto->nombre }}</h1>
    @if($producto->imagen)
      <img src="{{ asset('imagenes_productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
    @endif
    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 0, ',', '.') }}</p>
    <p><strong>Color:</strong> {{ $producto->color }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $producto->estado }}</p>

    <div class="actions">
      <a href="{{ route('productos.edit', $producto->id) }}" class="btn-edit">Modificar</a>

      <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">Eliminar</button>
      </form>
    </div>

    <div style="margin-top:1rem;">
      <a href="{{ route('productos.index') }}">← Volver a la lista</a>
    </div>
  </div>
</body>
</html>
