<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tienda de Celulares - Bienvenido</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      color: #333;
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
    .hero-image {
      max-width: 400px;
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      margin-bottom: 2rem;
    }
    h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: #007bff;
    }
    p {
      font-size: 1.25rem;
      margin-bottom: 2rem;
      max-width: 600px;
      line-height: 1.5;
    }
    .btn {
      background-color: #007bff;
      color: white;
      padding: 1rem 2rem;
      font-size: 1.1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .btn:hover {
      background-color: #0056b3;
    }
    @media (min-width: 768px) {
      .container {
        flex-direction: row;
        justify-content: space-around;
        text-align: left;
      }
      .text-content {
        max-width: 500px;
      }
      .hero-image {
        max-width: 500px;
        margin-bottom: 0;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <img class="hero-image" src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80" alt="Celulares modernos" />
    
    <div class="text-content">
      <h1>Encuentra tu próximo celular</h1>
      <p>Explora la mejor selección de smartphones Samsung, iPhone, Redmi, Motorola, Huawei y más. Calidad, tecnología y las últimas novedades al alcance de tu mano.</p>
      <a href="iniciosesion.html" class="btn">Iniciar Sesión</a>
    </div>
  </div>

</body>
</html>