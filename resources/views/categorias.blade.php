<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Productos por Categoría - Tienda de Celulares</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #e8e7d8;
      color: #3A3A3A;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
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
      height: 80px;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    nav img { width: 70px; height: 70px; border-radius: 50%; object-fit: cover; }
    nav .logo { font-weight: 700; font-size: 1.3rem; margin-left: 20px; }
    nav ul { list-style: none; display: flex; gap: 1.5rem; }
    nav ul li a { color: white; font-weight: 600; padding: 0.4rem 0.6rem; border-radius: 4px; transition: background-color 0.3s ease; }
    nav ul li a:hover { background-color: rgba(255,255,255,0.2); }
    .logout-btn {
      background-color: #F5A623;
      border: none;
      padding: 0.9rem 1rem;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 700;
      color: white;
      transition: background-color 0.3s ease;
    }
    .logout-btn:hover { background-color: #d98f1f; }

    main { flex-grow: 1; padding: 100px 2rem 2rem; max-width: 1200px; margin: 0 auto; width: 100%; }
    h1 { font-weight: 700; font-size: 2rem; margin-bottom: 1rem; color: #3A3A3A; text-align: center; }
    p.welcome-msg { font-size: 1.1rem; margin-bottom: 2rem; color: #9B9B9B; text-align: center; }

    .category-filter { display: flex; justify-content: center; align-items: center; gap: 12px; margin-bottom: 2rem; }
    select { padding: 10px 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; }
    .search-btn { 
      display: inline-flex; 
      align-items: center; 
      gap: 6px; 
      background-color: #4A90E2; 
      color: white; 
      border-radius: 6px; 
      padding: 8px 16px; 
      font-weight: 600; 
      cursor: pointer; 
      border: none;
      transition: background 0.3s ease;
    }
    .search-btn:hover { background-color: #357ABD; }

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
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
    .product-image { width: 100%; height: 140px; object-fit: cover; border-bottom: 1px solid #eee; }
    .product-info { padding: 1rem; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between; }
    .product-name { font-weight: 700; font-size: 1rem; margin-bottom: 0.5rem; color: #3A3A3A; }
    .product-price { color: #4A90E2; font-weight: 700; font-size: 1.1rem; }
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
    .details-btn:hover { background: #357ABD; }

    footer {
      background-color: #EAE8E4;
      color: #3A3A3A;
      padding: 1.5rem 2rem;
      text-align: center;
      margin-top: auto;
      border-top: 1px solid #9B9B9B;
    }
    footer p { margin: 0.2rem 0; }
    footer .social-links { margin-top: 0.8rem; }
    footer .social-links a { margin: 0 0.2rem; color: #3A3A3A; font-size: 1.2rem; display: inline-block; transition: color 0.3s ease; }
    footer .social-links a:hover { color: #4A90E2; }

    @media(max-width: 600px) {
      nav ul { display: none; }
      main { padding: 100px 1rem 1rem; }
    }
  </style>
</head>
<body>

  <nav>
    <img src="{{ asset('Imagenes/logo.png') }}" alt="Logo de Tienda de Celulares">
    <div class="logo">Tienda Celulares</div>
    <ul>
      <li><a href="/pagina_principal">Inicio</a></li>
      <li><a href="#">Categorías</a></li>
      <li><a href="{{ route('sobre_nosotros') }}">Sobre nosotros</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="logout-btn">Cerrar sesión</button>
    </form>
  </nav>

  <main>
    <h1>Productos por Categoría</h1>
    <p class="welcome-msg">Filtra los productos por categoría y encuentra lo que buscas.</p>

    <div class="category-filter">
      <form action="{{ route('categorias') }}" method="GET" style="display:flex; align-items:center; gap:10px;">
        <label for="categoria"><strong>Categoría:</strong></label>
        <select id="categoria" name="categoria">
            <option value="todas" {{ request('categoria')=='todas'?'selected':'' }}>Todas</option>
            <option value="C001" {{ request('categoria')=='C001'?'selected':'' }}>Samsung</option>
            <option value="C002" {{ request('categoria')=='C002'?'selected':'' }}>Apple</option>
            <option value="C003" {{ request('categoria')=='C003'?'selected':'' }}>Xiaomi</option>
            <option value="C004" {{ request('categoria')=='C004'?'selected':'' }}>Motorala</option>
            <option value="C005" {{ request('categoria')=='C005'?'selected':'' }}>Huawei</option>
        </select>

        <button type="submit" class="search-btn">
          <i class="fas fa-search"></i> Buscar
        </button>
      </form>
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
        <p style="text-align:center;">No hay productos registrados en esta categoría.</p>
      @endforelse
    </div>

  </main>

  <footer>
    <p>&copy; 2025 Tienda de Celulares. Todos los derechos reservados.</p>
    <p>Contacto: info@tiendacelulares.com | Tel: +57 312 345 6789</p>
    <div class="social-links" aria-label="Redes sociales">
      <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
      <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
    </div>
  </footer>

</body>
</html>
