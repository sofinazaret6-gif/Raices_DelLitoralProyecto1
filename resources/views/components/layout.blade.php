<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Página Principal' }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> <!-- CAMBIO: para colores -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="fondo"><!-- CAMBIO: bg-light se puede cambiar por una clase propia -->
     
     <x-navbar />

    <div style="height: 350px; background: transparent;"></div> <!-- Espacio para ver el fondo -->

    <nav  class="navbar navbar-dark mt-5" style="background-color: #43391e; margin-top: 150px; margin-bottom: 0;">
      <div class="container-fluid justify-content-center text-white">
        {{ $barraP }}  
      </div>
    </nav>
    
    <!-- CONTENIDO PRINCIPAL DE CADA VISTA -->
   <main class="container-fluid custom-bg ">
    <div class="container">
         {{ $slot }}
    </div>
    </main>
   
     <x-footer />
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>