<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> <!-- CAMBIO: para colores -->
</head>
<body class="fondo"><!-- CAMBIO: bg-light se puede cambiar por una clase propia -->

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg custom-navbar"> <!-- quitamos navbar-dark y bg-dark -->
        <div class="container">
            <!-- CAMBIO: reemplazo de texto por imagen -->
            <a class="navbar-brand" href="/">
    <img src="{{ asset('images/LogoRaices.png') }}" alt="Logo" class="img-fluid" style="max-height: 150px;">
</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Principal</a></li>
                    <li class="nav-item"><a class="nav-link" href="/quienes-somos">Quiénes Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/comercializacion">Comercialización</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="/terminos">Términos y Usos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/catalogo">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Consultas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 350px; background: transparent;"></div> <!-- Espacio para ver el fondo -->

    <nav  class="navbar navbar-dark mt-5" style="background-color: #43391e; margin-top: 150px; margin-bottom: 0;">
      <div class="container-fluid justify-content-center text-white">
         @yield('BarraP') 
      </div>
    </nav>
    
    <!-- CONTENIDO PRINCIPAL DE CADA VISTA -->
   <main class="container-fluid custom-bg ">
    <div class="container">
        @yield('content')
    </div>
</main>

    <!-- Footer -->
    <footer class=" custom-footer"><!-- CAMBIO: clase custom-footer para colores  -->
        &copy; 2026 Mi Empresa - Todos los derechos reservados
    </footer>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>