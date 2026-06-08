<div class="barraS">
    <nav class="navbar navbar-expand-lg custom-navbar py-1">
        <div class="container d-flex justify-content-between align-items-center">
            
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logoRaicesVSF.png') }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
            </a>

            <span class="navbar-text fw-bold text-uppercase d-none d-md-inline" style="color: #1B4D3E; letter-spacing: 1px;">
                Panel de Administración
            </span>

            <div class="d-flex align-items-center gap-3">
                
                <a href="{{ route('perfil') }}" class="d-flex align-items-center text-decoration-none" style="color: #1B4D3E;">
                    <i class="bi bi-person-badge-fill me-2" style="font-size: 20px;"></i>
                    <span class="fw-semibold">{{ session('nombre_usuario', 'Admin') }}</span>
                </a>

                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="d-none d-sm-inline">Cerrar Sesión</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
</div>

<div class="barraI">
    <nav class="navbar navbar-expand-lg custom-navbar py-0" style="border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container">
            <button class="navbar-toggler ms-auto my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin"
                aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavAdmin">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin"><i class="bi bi-speedometer2 me-1"></i> Inicio Panel</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProductos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-box-seam me-1"></i> Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
                            <li><a class="dropdown-item" href="/admin/productos">Administrar</a></li>
                            <li><a class="dropdown-item" href="{{ route('productos.gestionStock') }}">Stock y Visibilidad</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('admin.ventas') }}">
                         <i class="bi bi-currency-dollar me-1"></i> Listar Ventas
                         </a>
</li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/consultas"><i class="bi bi-envelope-paper me-1"></i> Ver Consultas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>