<x-layout>

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

<style>
.contenedor-blanco {
    background-color: rgba(255, 255, 255, 0.85);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(4px);
}

.img-efecto {
    transition: all 0.4s ease;
}
.img-efecto:hover {
    transform: scale(1.04);
}

.badge-beneficio {
    background-color: #e8f5e9;
    color: #2e7d32;
    padding: 10px 18px;
    border-radius: 50px;
    font-weight: 500;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}
.badge-beneficio:hover {
    background-color: #c8e6c9;
    transform: translateY(-3px);
}
</style>

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
                <h2 class="fw-bold mb-3">¡Bienvenidos a Raíces del Litoral!</h2>
                <p class="fs-5">
                    Somos tu <strong>vivero de confianza en Corrientes</strong>. Nos especializamos en la venta de 
                    plantas adaptadas a nuestro clima para asegurar que tu jardín crezca con fuerza.
                </p>
                <p class="text-muted">
                    Explora nuestra variedad de <strong>árboles frutales</strong>, plantas de interior y 
                    aromáticas. Además, encontrá las <strong>macetas y accesorios</strong> ideales para 
                    darle ese toque único a tu hogar.
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

        <div class="col-md-4 mb-4">
            <a href="/catalogo" class="text-decoration-none text-dark">
                <div class="card producto-card h-100 text-center p-3 border-0 shadow-sm">
                    <div style="height: 250px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('images/limoneroNuevo.png') }}" 
                             class="img-fluid rounded producto-img" 
                             style="max-height: 100%; object-fit: contain;">
                    </div>
                    <div class="mt-3">
                        <h5 class="fw-bold">Limonero</h5>
                        <p class="text-success fw-bold">$5000</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="/catalogo" class="text-decoration-none text-dark">
                <div class="card producto-card h-100 text-center p-3 border-0 shadow-sm">
                    <div style="height: 250px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('images/lavanda.png') }}" 
                             class="img-fluid rounded producto-img" 
                             style="max-height: 100%; object-fit: contain;">
                    </div>
                    <div class="mt-3">
                        <h5 class="fw-bold">Planta Aromática</h5>
                        <p class="text-success fw-bold">$3000</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="/catalogo" class="text-decoration-none text-dark">
                <div class="card producto-card h-100 text-center p-3 border-0 shadow-sm">
                    <div style="height: 250px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('images/tierraNuevo.png') }}" 
                             class="img-fluid rounded producto-img" 
                             style="max-height: 100%; object-fit: contain;">
                    </div>
                    <div class="mt-3">
                        <h5 class="fw-bold">Tierra Orgánica</h5>
                        <p class="text-success fw-bold">$2500</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="text-center mt-4">
        <a href="/catalogo" class="btn btn-success rounded-pill px-5 py-2">
            Ver todo el catálogo →
        </a>
    </div>

</div>


<!-- Consulta SECCIÓN  -->
<div class="container my-5">
    <div class="row align-items-center">

        <div class="col-lg-6 mb-4">
            <img src="{{ asset('images/tiendaPlantas.jpg') }}" 
                 class="img-fluid rounded-4 shadow w-100 img-efecto">
        </div>

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
                Realizar consulta →
            </a>

        </div>

    </div>
</div>

<!-- QUIENES SOMOS  -->
<div class="text-center my-5">
    <p class="fs-5">
        ¿Querés conocernos mejor?
        <a href="/quienes-somos" class="fw-bold text-success text-decoration-none">
            Visitá nuestra historia →
        </a>
    </p>
</div>

</x-layout>


