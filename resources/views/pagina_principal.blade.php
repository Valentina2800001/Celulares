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
      height: 80px;
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
      padding: 0.9rem 1rem;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
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
      color: #3A3A3A;
    }
    p.welcome-msg {
      font-size: 1.1rem;
      margin-bottom: 2rem;
      color: #9B9B9B;
    }

    /* Grid de productos */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill,minmax(220px,1fr));
      gap: 1.5rem;
    }
    .product-card {
      background-color: #FFFFFF;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.07);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transition: transform 0.2s ease;
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
      color: #3A3A3A;
    }
    .product-price {
      color: #4A90E2;
      font-weight: 700;
      font-size: 1.1rem;
    }
    .details-btn {
      display: inline-block;
      margin-top: 8px;
      padding: 6px 12px;
      background: #4A90E2;
      color: white;
      border-radius: 5px;
      text-align: center;
      font-weight: 600;
      transition: background 0.3s;
    }
    .details-btn:hover {
      background: #357ABD;
    }

    /* Footer */
    footer {
      background-color: #EAE8E4;
      color: #3A3A3A;
      padding: 1.5rem 2rem;
      text-align: center;
      margin-top: auto;
      border-top: 1px solid #9B9B9B;
    }
    footer p {
      margin: 0.2rem 0;
    }
    footer .social-links {
      margin-top: 0.8rem;
    }
    footer .social-links a {
      margin: 0 0.20rem;
      color: #3A3A3A;
      font-size: 1.2rem;
      display: inline-block;
      transition: color 0.3s ease;
    }
    footer .social-links a:hover {
      color: #4A90E2;
    }

    /* Responsive */
    @media(max-width: 600px) {
      nav ul {
        display: none;
      }
      main {
        padding: 80px 1rem 1rem;
      }
    }

    .add-product-container {
  text-align: center;
  margin-bottom: 2rem;
}

.add-product-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background-color: #4A90E2;
  color: white;
  padding: 10px 20px;
  border-radius: 6px;
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: background 0.3s ease, transform 0.2s ease;
}

.add-product-btn:hover {
  background-color: #357ABD;
  transform: translateY(-2px);
}

.add-product-btn i {
  font-size: 1.2rem;
}

  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

@if (session('success'))
  <div style="
    background-color: #DFF2BF;
    color: #4F8A10;
    padding: 12px;
    margin: 15px auto;
    border-radius: 6px;
    width: 80%;
    text-align: center;
    font-weight: bold;">
    {{ session('success') }}
  </div>
@endif

  <nav>
    <div class="logo">Tienda Celulares</div>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="{{ route('sobre_nosotros') }}" class="btn">Contactanos / Sobre nosotros</a>
    </ul>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
      @csrf
      <button type="submit" class="logout-btn">Cerrar sesión</button>
    </form>
  </nav>

  <main>
  <h1>¡Bienvenido!</h1>
  <p class="welcome-msg">Explora nuestra amplia selección de celulares y encuentra el que se adapta a ti.</p>

  <!-- 🔹 Botón Agregar Producto -->
  <div class="add-product-container">
    <a href="{{ route('formulario_productos') }}" class="add-product-btn">
      <i class="fas fa-plus"></i> Agregar Producto
    </a>
  </div>

  <div class="product-grid">
    @forelse($productos as $producto)
      <div class="product-card">
        @if($producto->imagen)
          <img src="{{ asset('imagenes_productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image">
        @else
          <img src="https://via.placeholder.com/220x140?text=Sin+imagen" alt="Sin imagen" class="product-image">
        @endif
        <div class="product-info">
          <div>
            <div class="product-name">{{ $producto->nombre }}</div>
            <div class="product-price">${{ number_format($producto->precio, 0, ',', '.') }}</div>
            <p>{{ $producto->descripcion }}</p>
          </div>
          <a href="{{ route('productos.show', $producto->id) }}" class="details-btn">Ver detalles</a>
        </div>
      </div>
    @empty
      <p>No hay productos registrados aún.</p>
    @endforelse
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
