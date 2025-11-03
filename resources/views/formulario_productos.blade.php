<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro de Producto - Tienda de Celulares</title>
  <style>
    * { box-sizing: border-box; }
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      color: #3A3A3A;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 2rem;
      text-align: center;
    }

    .form-card {
      background-color: #FFFFFF;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      max-width: 480px;
      width: 100%;
      padding: 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .form-card h1 {
      color: #007bff;
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .form-card p {
      color: #666;
      font-size: 1rem;
      margin-bottom: 2rem;
    }

    form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
    }

    label {
      text-align: left;
      font-weight: 600;
      color: #3A3A3A;
      font-size: 0.95rem;
    }

    input, select, textarea {
      width: 100%;
      padding: 0.9rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input:focus, select:focus, textarea:focus {
      border-color: #007bff;
      outline: none;
    }

    textarea {
      resize: none;
      height: 80px;
    }

    .btn {
      background-color: #007bff;
      color: white;
      padding: 1rem;
      font-size: 1.1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .errors {
      color: red;
      margin-bottom: 1rem;
      text-align: left;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-card">
      <h1>Registrar Producto</h1>
      <p>Completa la información para agregar un nuevo producto.</p>

      @if ($errors->any())
        <div class="errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
          <label for="id">ID del Producto</label>
          <input type="text" id="id" name="id" value="{{ old('id') }}" placeholder="Ej: P001">
        </div>

        <div>
          <label for="nombre">Nombre del Producto</label>
          <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Samsung Galaxy S24">
        </div>

        <div>
          <label for="categoria_id">Categoría</label>
          <select id="categoria_id" name="categoria_id">
            <option value="">Seleccione una categoría</option>
            <option value="C001" {{ old('categoria_id') == 'C001' ? 'selected' : '' }}>Samsung</option>
            <option value="C002" {{ old('categoria_id') == 'C002' ? 'selected' : '' }}>Apple</option>
            <option value="C003" {{ old('categoria_id') == 'C003' ? 'selected' : '' }}>Xiaomi</option>
            <option value="C004" {{ old('categoria_id') == 'C004' ? 'selected' : '' }}>Motorola</option>
            <option value="C005" {{ old('categoria_id') == 'C005' ? 'selected' : '' }}>Huawei</option>
          </select>
        </div>

        <div>
          <label for="precio">Precio</label>
          <input type="text" id="precio" name="precio" value="{{ old('precio') }}" placeholder="Ej: $3.000.000">
        </div>

        <div>
          <label for="color">Color</label>
          <input type="text" id="color" name="color" value="{{ old('color') }}" placeholder="Ej: Negro">
        </div>

        <div>
          <label for="stock">Stock</label>
          <input type="number" id="stock" name="stock" value="{{ old('stock') }}" min="0" placeholder="Ej: 25">
        </div>

        <div>
          <label for="descripcion">Descripción</label>
          <textarea id="descripcion" name="descripcion" placeholder="Ej: Smartphone con cámara avanzada y batería duradera.">{{ old('descripcion') }}</textarea>
        </div>

        <div>
          <label for="imagen">Imagen del Producto</label>
          <input type="file" id="imagen" name="imagen" accept="image/*">
        </div>

        <div>
          <label for="estado">Estado</label>
          <select id="estado" name="estado">
            <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
          </select>
        </div>

        <div>
  <label for="usuario_id">ID Usuario</label>
  <select id="usuario_id" name="usuario_id">
    <option value="">Seleccione un usuario</option>
    <option value="U001" {{ old('usuario_id') == 'U001' ? 'selected' : '' }}>U001</option>
    <option value="U002" {{ old('usuario_id') == 'U002' ? 'selected' : '' }}>U002</option>
  </select>
</div>


        <button type="submit" class="btn">Registrar Producto</button>
      </form>
    </div>
  </div>

</body>
</html>
