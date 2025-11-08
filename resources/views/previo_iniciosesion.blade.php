<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tienda de Celulares - Bienvenido</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #e8e7d8;
      color: #333;
    }

    /* 🔹 Barra superior */
    header {
      background-color: #007bff;
      color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    header h2 {
      margin: 0;
      font-size: 1.5rem;
    }
    header nav a {
      color: white;
      text-decoration: none;
      margin-left: 1.5rem;
      font-weight: 500;
      transition: opacity 0.3s;
    }
    header nav a:hover {
      opacity: 0.8;
    }

    /* 🔹 Contenido principal */
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: calc(100vh - 70px);
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

    /* 🔹 Sección de ventajas */
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2rem;
      justify-items: center;
      margin: 3rem auto;
      width: 90%;
      max-width: 1000px;
    }

    .feature-card {
      background: white;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      width: 100%;
      max-width: 250px;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .feature-card i {
      font-size: 2rem;
      color: #007bff;
      margin-bottom: 1rem;
    }

    .feature-card h3 {
      margin-bottom: 0.5rem;
      color: #007bff;
    }

    /* 🔹 Pie de página */
    footer {
      background-color: #f1f1f1;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
      color: #555;
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

  <!-- 🔹 Barra superior -->
  <header>
    <h2><i class="fas fa-mobile-alt"></i> Tienda de Celulares</h2>
  </header>

  <!-- 🔹 Contenido principal -->
  <div class="container">
    <img class="hero-image" src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80" alt="Celulares modernos" />
    <div class="text-content">
      <h1>Encuentra tu próximo celular</h1>
      <p>Explora la mejor selección de smartphones Samsung, iPhone, Redmi, Motorola, Huawei y más. Calidad, tecnología y las últimas novedades al alcance de tu mano.</p>
      <a href="{{ route('inicio.sesion') }}" class="btn"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
    </div>
  </div>

  <!-- 🔹 Sección de ventajas (centrada y uniforme) -->
  <section class="features">
    <div class="feature-card">
      <i class="fas fa-shipping-fast"></i>
      <h3>Envíos rápidos</h3>
      <p>Recibe tu pedido en tiempo récord en cualquier parte del país.</p>
    </div>
    <div class="feature-card">
      <i class="fas fa-lock"></i>
      <h3>Compra segura</h3>
      <p>Tus datos están protegidos con encriptación y métodos de pago confiables.</p>
    </div>
    <div class="feature-card">
      <i class="fas fa-tags"></i>
      <h3>Ofertas exclusivas</h3>
      <p>Accede a descuentos y promociones especiales cada semana.</p>
    </div>
    <div class="feature-card">
      <i class="fas fa-headset"></i>
      <h3>Soporte 24/7</h3>
      <p>Estamos disponibles para resolver tus dudas y ayudarte en todo momento.</p>
    </div>
  </section>

  <!-- 🔹 Pie de página -->
  <footer>
    &copy; 2025 Tienda de Celulares. Todos los derechos reservados.
  </footer>

</body>
</html>
