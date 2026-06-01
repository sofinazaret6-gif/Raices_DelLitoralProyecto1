<!-- NAV SUPERIOR FIJO (BACKEND / PANEL DE CONTROL) -->
<div class="barraS">
    <!-- Navbar principal: Logo + Identificación del Admin -->
    <nav class="navbar navbar-expand-lg custom-navbar py-1">
        <div class="container d-flex justify-content-between align-items-center">
            
            <!-- Logo que redirige a la raíz o al inicio del panel -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logoRaicesVSF.png') }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
            </a>

            <!-- Texto indicador de Panel Admin (Opcional, da un toque profesional) -->
            <span class="navbar-text fw-bold text-uppercase d-none d-md-inline" style="color: #1B4D3E; letter-spacing: 1px;">
                Panel de Administración
            </span>

           <!-- Información del Perfil -->
                  <a href="{{ route('perfil') }}"
                         class="d-flex align-items-center text-decoration-none"
                          style="color: #1B4D3E;">

                        <i class="bi bi-person-badge-fill me-2"
                        style="font-size:20px;">
                           </i>

                <span class="fw-semibold">
                           {{ session('nombre_usuario', 'Admin') }}
               </span>

                 </a>

                <!-- Botón Cerrar Sesión -->
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="d-none d-sm-inline">Cerrar Sesión</span>
                </a>

                <!-- Formulario oculto requerido por Laravel para el Logout seguro -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </nav>
</div>

<!-- NAV INFERIOR: Menú de Gestión del Admin -->
<div class="barraI">
    <nav class="navbar navbar-expand-lg custom-navbar py-0" style="border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container">
            <!-- Botón para responsive (Móviles) -->
            <button class="navbar-toggler ms-auto my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin"
                aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Links de gestión -->
            <div class="collapse navbar-collapse" id="navbarNavAdmin">
                <ul class="navbar-nav mx-auto text-center">
                    
                    <!-- Inicio del Panel -->
                    <li class="nav-item">
                        <a class="nav-link" href="/admin"><i class="bi bi-speedometer2 me-1"></i> Inicio Panel</a>
                    </li>

                    <!-- DROPDOWN: Productos (Agrupa Listar, Registrar y Gestionar para no saturar) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProductos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-box-seam me-1"></i> Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProductos">
                            <li><a class="dropdown-menu-item dropdown-item" href="/admin/productos">Listar Productos</a></li>
                            <li><a class="dropdown-menu-item dropdown-item" href="/admin/productos/create">Registrar Producto</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-menu-item dropdown-item" href="/admin/productos/gestionar">Gestionar Stock/Categorías</a></li>
                        </ul>
                    </li>

                    <!-- Ventas -->
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/ventas">
                            <i class="bi bi-currency-dollar me-1"></i> Listar Ventas
                        </a>
                    </li>

                    <!-- Consultas -->
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/consultas">
                            <i class="bi bi-envelope-paper me-1"></i> Ver Consultas
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
