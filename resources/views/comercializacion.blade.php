<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Productos')</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        .navbar {
            font-family: "Trebuchet MS", sans-serif;
        }

        .nav-link {
            text-transform: capitalize; /* Pone la primera letra en mayúscula */
            font-size: 17px;
            color: #2c3e50 !important; /* Gris oscuro suave */
            padding-left: 15px !important;
            padding-right: 15px !important;
            transition: color 0.3s ease; /* Suaviza el cambio de color al pasar el mouse */
        }

        .nav-link:hover {
            color: #27ae60 !important; /* Verde al pasar el mouse */
        }

        .custom-footer {
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
            /* Aquí puedes añadir más estilos para tu footer */
        }

        .fondo {
            /* Asegúrate de definir esta clase en estilos.css o aquí */
        }
    </style>
</head>
<body class="fondo">

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/LogoRaices.png') }}" alt="Logo Raíces" class="img-fluid" style="max-height: 150px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/P-aromaticas">Plantas Aromáticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/P-frutales">Plantas frutales</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Macetas">Macetas y abono</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Asesoria">Necesito asesoramiento</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="container-fluid custom-bg mt-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="custom-footer">
        &copy; 2026 Mi Empresa - Todos los derechos reservados
    </footer>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>