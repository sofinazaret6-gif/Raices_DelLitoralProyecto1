<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title> <!-- Ahora el título puede cambiar por vista -->

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <!-- Barra de navegación -->
    <nav>
        <a href="/">Principal</a>
        <a href="/quienes-somos">Quiénes Somos</a>
        <a href="/comercializacion">Comercialización</a>
        <a href="/contacto">Contacto</a>
        <a href="/terminos">Términos y Usos</a>
        <a href="#">Catálogo</a>
        <a href="#">Consultas</a>
    </nav>
    
    <!-- CONTENIDO PRINCIPAL DE CADA VISTA -->
    <main>
        @yield('content')  <!-- <- Esto es lo que faltaba -->
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2026 Mi Empresa - Todos los derechos reservados
    </footer>

</body>
</html>