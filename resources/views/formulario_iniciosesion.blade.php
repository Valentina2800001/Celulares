<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro de Usuario - Tienda de Celulares</title>
  <style>
    * {
      box-sizing: border-box;
    }
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
      max-width: 450px;
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

    input, select {
      width: 100%;
      padding: 0.9rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #007bff;
      outline: none;
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
  </style>
</head>
<body>

  <div class="container">
    <div class="form-card">
      <h1>Registrar Usuario</h1>
      <p>Completa la información para crear un nuevo administrador.</p>

      <form action="#" method="POST">
        <div>
          <label for="id">ID</label>
          <input type="text" id="id" name="id" placeholder="Ej: USR001" required>
        </div>

        <div>
          <label for="nombre">Nombre completo</label>
          <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required>
        </div>

        <div>
          <label for="correo">Correo electrónico</label>
          <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required>
        </div>

        <div>
          <label for="rol">Rol</label>
          <input type="text" id="rol" name="rol" value="Administrador" readonly style="background-color:#f0f0f0;">
        </div>

        <div>
          <label for="contraseña">Contraseña</label>
          <input type="password" id="contraseña" name="contraseña" placeholder="********" required>
        </div>

        <div>
          <label for="numIdentificacion">Número de Identificación</label>
          <input type="number" id="numIdentificacion" name="numIdentificacion" placeholder="Ej: 1234567890" required>
        </div>

        <div>
          <label for="estado">Estado</label>
          <select id="estado" name="estado" required>
            <option value="Activo" selected>Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>
        <a href="{{ route('pagina_principal') }}" class="btn">Registrar</a>
      </form>
    </div>
  </div>

</body>
</html>
