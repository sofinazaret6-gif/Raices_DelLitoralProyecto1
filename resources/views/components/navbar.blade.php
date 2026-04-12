<!-- CONTENEDOR SUPERIOR -->
<div class="barraS">
<nav class="navbar navbar-expand-lg custom-navbar py-1">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logoRaicesVSF.png') }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
        </a>
       <ul class="navbar-nav mx-auto"> 
            <li class="nav-item">
                <a href="/" class="nav-link px-2 color-navbar" ><i class="bi bi-person-fill" style="font-size: 24px"></i> </a>
             </li>
                <li class="nav-item">    
             <a href="/" class="nav-link px-2 color-navbar" > <i class="bi bi-cart3" style="font-size: 24px"></i> </a>
        </li>
        </ul>
        <!-- Redes Sociales (visibles siempre) -->
        <div class="d-flex">
            <a href="https://facebook.com" class="nav-link px-2" style="color: #1B4D3E;"><i class="fa-brands fa-facebook fa-lg"></i></a>
            <a href="mailto:tuemail@ejemplo.com" class="nav-link px-2" style="color: #1B4D3E;"><i class="fa-solid fa-envelope fa-lg"></i></a>
        </div>
    </div>
</nav>
</div>

<!-- NAV INFERIOR: Menú de Navegación -->
 <div class="barraI">
<nav class="navbar navbar-expand-lg custom-navbar py-0" style="border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto"> <!-- 'mx-auto' para centrar los links -->
                <li class="nav-item"><a class="nav-link" href="/">Principal</a></li>
                <li class="nav-item"><a class="nav-link" href="/quienes-somos">Quiénes Somos</a></li>
                <li class="nav-item"><a class="nav-link" href="/catalogo">Catálogo</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Consultas</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>


