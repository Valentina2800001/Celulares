<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - Tienda de Celulares</title>
  <style>
    /* Reset y base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #F2F1EF; /* Gris muy claro cálido */
      color: #3A3A3A; /* Gris oscuro frío */
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    a {
      text-decoration: none;
      color: inherit;
    }

    /* Navbar */
    nav {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: #4A90E2; /* Azul acero suave */
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
    }
    nav ul li a:hover {
      background-color: rgba(255,255,255,0.2);
    }
    nav .logout-btn {
      background-color: #F5A623; /* Naranja coral suave */
      border: none;
      padding: 0.4rem 1rem;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 600;
      color: white;
      transition: background-color 0.3s ease;
    }
    nav .logout-btn:hover {
      background-color: #d98f1f; /* Naranja coral más oscuro */
    }

    /* Main content */
    main {
      flex-grow: 1;
      padding: 80px 2rem 2rem; /* espacio por navbar */
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
    }
    h1 {
      font-weight: 700;
      font-size: 2.2rem;
      margin-bottom: 1rem;
      color: #3A3A3A; /* Gris oscuro frío */
    }
    p.welcome-msg {
      font-size: 1.1rem;
      margin-bottom: 2rem;
      color: #9B9B9B; /* Gris medio */
    }

    /* Grid de productos */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill,minmax(220px,1fr));
      gap: 1.5rem;
    }
    .product-card {
      background-color: #FFFFFF; /* Blanco con toque cálido */
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.07);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transition: transform 0.2s ease;
      cursor: pointer;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
    .product-image {
      width: 100%;
      height: 140px;
      object-fit: cover;
      border-bottom: 1px solid #eee;
    }
    .product-info {
      padding: 1rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .product-name {
      font-weight: 700;
      font-size: 1rem;
      margin-bottom: 0.5rem;
      color: #3A3A3A; /* Gris oscuro frío */
    }
    .product-price {
      color: #4A90E2; /* Azul acero suave */
      font-weight: 700;
      font-size: 1.1rem;
    }

    /* Footer */
    footer {
      background-color: #EAE8E4; /* Gris muy claro cálido */
      color: #3A3A3A; /* Gris oscuro frío */
      padding: 1.5rem 2rem;
      text-align: center;
      margin-top: auto;
      border-top: 1px solid #9B9B9B; /* Gris medio */
    }
    footer p {
      margin: 0.2rem 0;
    }
    footer .social-links {
      margin-top: 0.8rem;
    }
    footer .social-links a {
      margin: 0 0.8rem;
      color: #3A3A3A; /* Gris oscuro frío */
      font-size: 1.2rem;
      display: inline-block;
      transition: color 0.3s ease;
    }
    footer .social-links a:hover {
      color: #4A90E2; /* Azul acero suave */
    }

    /* Responsive */
    @media(max-width: 600px) {
      nav ul {
        display: none; /* para simplificar en móvil */
      }
      main {
        padding: 80px 1rem 1rem;
      }
      .product-card {
        height: auto;
      }
    }
  </style>
  <!-- Puedes añadir iconos de redes sociales con fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

  <nav>
    <div class="logo">Tienda Celulares</div>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Productos</a></li>
      <li><a href="#">Ofertas</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="logout-btn">Cerrar sesión</button>
</form>

  </nav>

  <main>
    <h1>¡Bienvenido, Usuario!</h1>
    <p class="welcome-msg">Explora nuestra amplia selección de celulares y encuentra el que se adapta a ti.</p>

    <div class="product-grid">
      <!-- Aquí algunos ejemplos, puedes agregar todos -->
      <div class="product-card" title="Samsung Galaxy S24 Ultra">
        <img class="product-image" src="https://images.samsung.com/is/image/samsung/p6pim/es/sm-s918blvbesm/gallery/es-galaxy-s24-ultra-s918-sm-s918blvbesm-533220488?$730_584_PNG$" alt="Samsung Galaxy S24 Ultra" />
        <div class="product-info">
          <div class="product-name">Samsung Galaxy S24 Ultra</div>
          <div class="product-price">$1200 USD</div>
        </div>
      </div>

      <div class="product-card" title="iPhone 15 Pro Max">
        <img class="product-image" src="https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-15-pro-max-gold-select-2023?wid=940&hei=1112&fmt=png-alpha&.v=1691642315869" alt="iPhone 15 Pro Max" />
        <div class="product-info">
          <div class="product-name">iPhone 15 Pro Max</div>
          <div class="product-price">$1399 USD</div>
        </div>
      </div>

      <div class="product-card" title="Redmi Note 13 Pro+ 5G">
        <img class="product-image" src="https://i01.appmifile.com/webfile/globalimg/products/pc/redmi-note-13-pro/overview/01.png" alt="Redmi Note 13 Pro+ 5G" />
        <div class="product-info">
          <div class="product-name">Redmi Note 13 Pro+ 5G</div>
          <div class="product-price">$399 USD</div>
        </div>
      </div>

      <div class="product-card" title="Motorola Edge 50 Pro">
        <img class="product-image" src="https://motorolaus.vtexassets.com/arquivos/ids/159314-800-auto?v=638123031913170000&width=800&height=auto&aspect=true" alt="Motorola Edge 50 Pro" />
        <div class="product-info">
          <div class="product-name">Motorola Edge 50 Pro</div>
          <div class="product-price">$699 USD</div>
        </div>
      </div>

      <div class="product-card" title="Huawei P60 Pro">
        <img class="product-image" src="https://consumer.huawei.com/content/dam/huawei-cbg-site/common/mkt/pdp/phones/p60-pro/img/kv-phone.png" alt="Huawei P60 Pro" />
        <div class="product-info">
          <div class="product-name">Huawei P60 Pro</div>
          <div class="product-price">$799 USD</div>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Tienda de Celulares. Todos los derechos reservados.</p>
    <p>Contacto: info@tiendacelulares.com | Tel: +1 234 567 890</p>
    <div class="social-links" aria-label="Redes sociales">
      <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
      <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
    </div>
  </footer>

</body>
</html>