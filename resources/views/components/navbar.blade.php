<div class="barraS">
    <nav class="navbar navbar-expand-lg custom-navbar py-1">
        <div class="container d-flex justify-content-between align-items-center">
            
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logoRaicesVSF.png') }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
            </a>

            <ul class="navbar-nav mx-auto align-items-center flex-row gap-2"> 
                
                @if(!session()->has('id_usuario'))
                    <li class="nav-item">
                       <a href="{{ route('login.form') }}" class="nav-link px-2 color-navbar" title="Iniciar Sesión">
                            <i class="bi bi-person-fill" style="font-size: 24px"></i>
                        </a>
                    </li>
                @endif

                @if(session()->has('id_usuario'))
                    <li class="nav-item">
                       <a href="{{ route('perfil') }}" class="nav-link px-2 color-navbar d-flex align-items-center gap-1" title="Mi Perfil">
                            <i class="bi bi-person-check-fill" style="font-size: 24px"></i>
                            <span class="small fw-semibold d-none d-md-inline">{{ session('nombre_usuario') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">    
                        <a href="/carrito" class="nav-link px-2 color-navbar" title="Carrito de compras">
                            <i class="bi bi-cart3" style="font-size: 24px"></i>
                        </a>
                    </li>
                @endif
                
            </ul>

            <div class="d-flex">
                <a href="https://facebook.com" class="nav-link px-2" style="color: #1B4D3E;">
                    <i class="fa-brands fa-facebook fa-lg"></i>
                </a>
                <a href="mailto:raicesdellitoral@gmail.com" class="nav-link px-2" style="color: #1B4D3E;">
                    <i class="fa-solid fa-envelope fa-lg"></i>
                </a>
            </div>

        </div>
    </nav>
</div>

<div class="barraI">
    <nav class="navbar navbar-expand-lg custom-navbar py-0" style="border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container d-flex justify-content-between align-items-center position-relative">
            
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-center">
                    
                    <li class="nav-item"><a class="nav-link" href="/">Principal</a></li>
                    <li class="nav-item"><a class="nav-link" href="/quienes-somos">Quiénes Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/consultas">Contacto</a></li>

                    @if(!session()->has('id_usuario'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Iniciar Sesión</a></li>
                    @endif

                </ul>
            </div>

            @if(session()->has('id_usuario'))
                <div class="d-flex align-items-center ps-lg-4 py-2 py-lg-0" style="position: absolute; right: 0;">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="nav-link" title="Cerrar Sesión" style="background: none; border: none; padding: 0 1.5rem 0 0; cursor: pointer; color: white !important;">
                            <i class="fas fa-door-open" style="font-size: 22px;"></i>
                        </button>
                    </form>
                </div>
            @endif

        </div>
    </nav>
</div>