<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ $title ?? 'Página Principal' }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>

    <x-navbar_Admin />
    
    <div class="banner d-flex flex-column justify-content-end">
        <div class="barra-marron text-center text-white py-2">
            {{ $barraP }}
        </div>
    </div>
    
    <main class="container-fluid custom-bg">
        <div class="container">
             {{ $slot }}
        </div>
    </main>

    <x-footer_Admin />

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>