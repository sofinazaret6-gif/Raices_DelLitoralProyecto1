<nav class="navbar navbar-expand-lg custom-navbar"> <!-- quitamos navbar-dark y bg-dark -->
        <div class="container">
            <!-- CAMBIO: reemplazo de texto por imagen -->
            <a class="navbar-brand" href="/">
    <img src="{{ asset('images/LogoRaices.png') }}" alt="Logo" class="img-fluid" style="max-height: 150px;">
    </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Principal</a></li>
                    <li class="nav-item"><a class="nav-link" href="/quienes-somos">Quiénes Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/catalogo">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Consultas</a></li>
                     <li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>
                   </ul>
                    <div class="d-flex ms-lg-3">
                     <a href="https://facebook.com" class="nav-link px-2 text-white"><i class="fa-brands fa-facebook fa-lg"></i></a>
                     <a href="mailto:tuemail@ejemplo.com" class="nav-link px-2 text-white"><i class="fa-solid fa-envelope fa-lg"></i></a>
                   </div>
            </div>
        </div>
    </nav>
