<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contacto y Redes - Tienda de Celulares</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #F2F1EF;
      color: #3A3A3A;
    }

    /* Navbar */
    nav {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: #4A90E2;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
      height: 60px;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    nav .logo {
      font-weight: 700;
      font-size: 1.3rem;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 1.5rem;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: white;
      font-weight: 600;
      padding: 0.4rem 0.6rem;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    nav ul li a:hover {
      background-color: rgba(255,255,255,0.2);
    }

    nav .logout-btn {
      background-color: #F5A623;
      border: none;
      padding: 0.4rem 1rem;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 600;
      color: white;
      transition: background-color 0.3s ease;
    }

    nav .logout-btn:hover {
      background-color: #d98f1f;
    }

    /* Header */
    header {
      background-color: #4A90E2;
      color: white;
      text-align: center;
      padding: 6rem 1rem 2rem; /* más espacio arriba para compensar la navbar fija */
    }

    header h1 {
      margin: 0;
      font-size: 2rem;
    }

    header p {
      margin-top: 0.5rem;
      font-size: 1.1rem;
    }

    /* Contenido principal */
    main {
      max-width: 1000px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      line-height: 1.7;
    }

    h2 {
      color: #4A90E2;
      margin-top: 1.5rem;
    }

    .section {
      margin-bottom: 2rem;
    }

    /* Redes sociales */
    .social {
      text-align: center;
      margin-top: 2rem;
    }

    .social a {
      color: #3A3A3A;
      font-size: 1.5rem;
      margin: 0 0.5rem;
      transition: color 0.3s ease;
    }

    .social a:hover {
      color: #4A90E2;
    }

    /* Footer */
    footer {
      background-color: #EAE8E4;
      color: #3A3A3A;
      text-align: center;
      padding: 1rem;
      margin-top: 3rem;
      border-top: 1px solid #9B9B9B;
    }

    /* Ajuste de botones */
    .btn {
      background-color: #4A90E2;
      color: white;
      padding: 6px 12px;
      border-radius: 4px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #3a78ba;
    }

  </style>
</head>
<body>

  <!-- Barra de navegación -->
  <nav>
    <div class="logo">Tienda Celulares</div>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="{{ route('sobre_nosotros') }}">Contáctanos / Sobre nosotros</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST" style="display:flex; align-items:center; gap:0.5rem;">
      @csrf
      <button type="submit" class="logout-btn">Cerrar sesión</button>
    </form>
  </nav>

  <!-- Encabezado -->
  <header>
    <h1>Sobre Nosotros</h1>
    <p>Tu tienda de confianza en tecnología y celulares</p>
  </header>

  <!-- Contenido principal -->
  <main>
    <section class="section">
      <h2>Quiénes Somos</h2>
      <p>
        En <strong>Tienda de Celulares</strong> somos una empresa dedicada a ofrecer los mejores dispositivos móviles del mercado. 
        Nos apasiona la tecnología y trabajamos día a día para brindar a nuestros clientes productos originales, con garantía y al mejor precio.
      </p>
      <p>
        Nuestro objetivo es que cada cliente encuentre el celular ideal para sus necesidades, combinando innovación, diseño y funcionalidad.
      </p>
    </section>

    <section class="section">
      <h2>Nuestra Misión</h2>
      <p>
        Facilitar el acceso a la tecnología móvil de calidad, ofreciendo una experiencia de compra confiable, rápida y segura. 
        Nos comprometemos con la satisfacción de nuestros clientes, brindando asesoría personalizada y un servicio posventa responsable.
      </p>
    </section>

    <section class="section">
      <h2>Contáctanos</h2>
      <p>
        Si deseas comunicarte con nosotros para resolver dudas, conocer más sobre nuestros productos o recibir asesoría personalizada, 
        puedes escribirnos o visitarnos en los siguientes canales:
      </p>
      <ul>
        <li><strong>Correo electrónico:</strong> contacto@tiendacelulares.com</li>
        <li><strong>Teléfono:</strong> +57 321 654 9870</li>
        <li><strong>Dirección:</strong> Calle 123 #45-67, Bogotá, Colombia</li>
        <li><strong>Horario de atención:</strong> Lunes a sábado de 9:00 a.m. a 6:00 p.m.</li>
      </ul>
    </section>

    <section class="social">
      <h2>Síguenos en nuestras redes</h2>
      <p>Entérate de las últimas novedades, lanzamientos y promociones.</p>
      <div>
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
      </div>
    </section>
  </main>

  <!-- Pie de página -->
  <footer>
    <p>&copy; 2025 Tienda de Celulares. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
