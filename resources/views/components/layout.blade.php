<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título dinámico (cambia según la vista) -->
    <title>{{ $title ?? 'Página Principal' }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> <!-- CAMBIO: para colores -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<!-- Componente reutilizable: Navbar -->
     <x-navbar />
   <!-- Banner superior con texto dinámico -->
   <div class="banner d-flex flex-column justify-content-end">
    <div class="barra-marron text-center text-white py-2">
        {{ $barraP }}
    </div>
    </div>
    
    <!-- CONTENIDO PRINCIPAL DE CADA VISTA -->
  <main class="container-fluid custom-bg">
    <div class="container">
         {{ $slot }}  <!-- Acá se inserta el contenido de cada vista -->
    </div>
    </main>
   <!-- Componente reutilizable: Footer -->
     <x-footer />
      <!-- JS de Bootstrap (para menú, botones, etc.) -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>