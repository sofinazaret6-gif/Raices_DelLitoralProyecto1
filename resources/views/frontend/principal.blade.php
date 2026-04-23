<x-layout>

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

<x-slot:title>Principal</x-slot:title>

<x-slot:barraP>
    <h4>Vivero en Corrientes</h4>
</x-slot:barraP>

<!-- SECCIÓN PRINCIPAL -->
<div class="container-fluid px-5">
    <div class="row gx-4 align-items-stretch">
        
        <!-- TEXTO -->
        <div class="col-lg-6 mb-4">
            <div class="contenedor-blanco h-100 d-flex flex-column justify-content-center p-4">
                <h2 class="fw-bold">¡Bienvenidos a Nuestra Página Web!</h2>
                <p class="fs-5">
                    <strong>Raíces del Litoral</strong> es tu vivero en Corrientes. 
                    Te ayudamos a crear tu espacio verde con plantas adaptadas al clima local.
                </p>
            </div>
        </div>

        <!-- IMÁGENES -->
        <div class="col-lg-6 mb-4">
            <div class="contenedor-blanco h-100 p-4">
                <img src="{{ asset('images/fotoSubir.jpg') }}" 
                     class="img-fluid rounded shadow mb-3 w-100" 
                     style="height: 180px; object-fit: cover;">
                
                <img src="{{ asset('images/tiendaPlantas.jpg') }}" 
                     class="img-fluid rounded shadow w-100" 
                     style="height: 180px; object-fit: cover;">
            </div>
        </div>

    </div>
</div>

<!-- PRODUCTOS DESTACADOS -->
<div class="container my-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color:#1e3d2f;">🌿 Productos destacados</h2>
        <p class="text-muted">Elegí tu próxima planta favorita</p>
    </div>

    <div class="row">

        <!-- PRODUCTO 1 -->
        <div class="col-md-4 mb-4">
            <a href="/comercializacion" class="text-decoration-none text-dark">
                <div class="card producto-card h-100 text-center p-3">
                    <img src="{{ asset('images/tiendaPlantas.jpg') }}" 
                         class="img-fluid rounded mb-3 producto-img">
                    <h5 class="fw-bold">Limonero</h5>
                    <p class="text-success fw-bold">$5000</p>
                </div>
            </a>
        </div>

        <!-- PRODUCTO 2 -->
        <div class="col-md-4 mb-4">
            <a href="/comercializacion" class="text-decoration-none text-dark">
                <div class="card producto-card h-100 text-center p-3">
                    <img src="{{ asset('images/fotoSubir.jpg') }}" 
                         class="img-fluid rounded mb-3 producto-img">
                    <h5 class="fw-bold">Planta Aromática</h5>
                    <p class="text-success fw-bold">$3000</p>
                </div>
            </a>
        </div>

        <!-- PRODUCTO 3 -->
        <div class="col-md-4 mb-4">
            <a href="/comercializacion" class="text-decoration-none text-dark">
                <div class="card producto-card h-100 text-center p-3">
                    <img src="{{ asset('images/tiendaPlantas.jpg') }}" 
                         class="img-fluid rounded mb-3 producto-img">
                    <h5 class="fw-bold">Tierra Orgánica</h5>
                    <p class="text-success fw-bold">$2500</p>
                </div>
            </a>
        </div>

    </div>

    <!-- BOTÓN -->
    <div class="text-center mt-4">
        <a href="/comercializacion" class="btn btn-success rounded-pill px-5 py-2">
            Ver todo el catálogo →
        </a>
    </div>

</div>


<!-- NUEVA SECCIÓN (LA QUE QUERÍAS) -->
<div class="container my-5">
    <div class="row align-items-center">

        <!-- IMAGEN (usa una que ya existe) -->
        <div class="col-lg-6 mb-4">
            <img src="{{ asset('images/tiendaPlantas.jpg') }}" 
                 class="img-fluid rounded-4 shadow w-100 img-efecto">
        </div>

        <!-- TEXTO -->
        <div class="col-lg-6 mb-4">

            <p class="text-uppercase fw-bold text-success small mb-2">
                🌿 Asesoramiento
            </p>

            <h2 class="fw-bold mb-3" style="color:#1e3d2f;">
                Hacemos que tus plantas crezcan fuertes 🌱
            </h2>

            <p class="fs-5 text-muted mb-4">
                Te acompañamos con consejos y cuidados para que tus plantas prosperen en el clima de Corrientes.
            </p>

            <div class="d-flex flex-wrap gap-2 mb-4">
                <span class="badge-beneficio">🌱 Experiencia</span>
                <span class="badge-beneficio">📦 Entrega cuidada</span>
                <span class="badge-beneficio">✅ Calidad</span>
            </div>

            <a href="/consultas" class="btn btn-success rounded-pill px-4">
                Obtener más información →
            </a>

        </div>

    </div>
</div>

<!-- LINK QUIENES SOMOS (MEJORADO) -->
<div class="text-center my-5">
    <p class="fs-5">
        ¿Querés conocernos mejor?
        <a href="/quienes-somos" class="fw-bold text-success text-decoration-none">
            Visitá nuestra historia →
        </a>
    </p>
</div>

</x-layout>


