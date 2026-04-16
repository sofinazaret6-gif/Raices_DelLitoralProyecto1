<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Página Principal' }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> <!-- CAMBIO: para colores -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="fondo"><!-- CAMBIO: bg-light se puede cambiar por una clase propia -->
     
     <x-navbar />

   <div class="banner d-flex flex-column justify-content-end">
    <div class="barra-marron text-center text-white py-2">
        {{ $barraP }}
    </div>
    </div>
    
    <!-- CONTENIDO PRINCIPAL DE CADA VISTA -->
  <main class="container-fluid custom-bg">
    <div class="container">
         {{ $slot }}
    </div>
    </main>
   
     <x-footer />
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>