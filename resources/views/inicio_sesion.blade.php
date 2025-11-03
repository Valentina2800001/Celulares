<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar Sesión - Tienda de Celulares</title>
  <style>
    /* Reset y base */
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

    /* Contenedor principal */
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 2rem;
      text-align: center;
    }

    /* Tarjeta de login */
    .login-card {
      background-color: #FFFFFF;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
      padding: 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .login-card h1 {
      color: #007bff;
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .login-card p {
      color: #666;
      font-size: 1rem;
      margin-bottom: 2rem;
    }

    /* Campos del formulario */
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

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.9rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
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

    .extra-links {
      margin-top: 1.5rem;
      font-size: 0.95rem;
    }

    .extra-links a {
      color: #007bff;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .extra-links a:hover {
      color: #0056b3;
    }

    /* Imagen lateral en pantallas grandes */
    @media (min-width: 900px) {
      .container {
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 5rem;
        text-align: left;
      }

      .hero-image {
        max-width: 450px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      }
    }
  </style>
</head>
<body>

  <div class="container">
     <img class="hero-image" src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80" alt="Celulares modernos" />
    

    <div class="login-card">
      <h1>Iniciar Sesión</h1>
      <p>Accede a tu cuenta para gestionar productos y explorar ofertas exclusivas.</p>

      <form action="{{ route('login') }}" method="POST">
    @csrf

        <div>
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="correo" placeholder="tucorreo@ejemplo.com" required>
        </div>

        <div>
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="contraseña" placeholder="********" required>
        </div>

        <button type="submit" class="btn">Entrar</button>

      </form>

      <div class="extra-links">
        <p>¿No tienes cuenta? <a href="{{route('formulario_iniciosesion')}}">Regístrate aquí</a></p>
      </div>
    </div>
  </div>

  @if ($errors->any())
  <div style="color:red; margin-top: 1rem;">
    {{ $errors->first() }}
  </div>
@endif

</body>
</html>
