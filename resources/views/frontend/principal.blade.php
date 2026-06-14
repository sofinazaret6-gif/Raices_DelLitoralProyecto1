<x-layout>

<x-slot:title>Principal</x-slot:title>

<x-slot:barraP>
    <h4>Vivero en Corrientes</h4>
</x-slot:barraP>

<div class="container-fluid px-5">
    <div class="row gx-4 align-items-stretch">
        
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
                    dale ese toque único a tu hogar.
                </p>
            </div>
        </div>

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

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color:#1e3d2f;">🌿 Productos Nuevos</h2>
        <p class="text-muted">Elegí tu próxima planta favorita</p>
    </div>

    <div class="row">
        
        @forelse($productosDestacados as $producto)
            <div class="col-md-4 mb-4">
                <a href="{{ route('ver.catalogo') }}" class="text-decoration-none text-dark">
                    <div class="card producto-card h-100 text-center p-3 border-0 shadow-sm">
                        
                        <div style="height: 250px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            @if(str_contains($producto->imagen, 'images/'))
                                <img src="{{ asset($producto->imagen) }}" 
                                     class="img-fluid rounded producto-img" 
                                     style="max-height: 100%; object-fit: contain;"
                                     alt="{{ $producto->nombre }}">
                            @else
                                <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                     class="img-fluid rounded producto-img" 
                                     style="max-height: 100%; object-fit: contain;"
                                     alt="{{ $producto->nombre }}">
                            @endif
                        </div>

                        <div class="mt-3">
                            <h5 class="fw-bold">{{ $producto->nombre }}</h5>
                            <p class="text-success fw-bold">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center my-4">
                <div class="alert alert-light border shadow-sm d-inline-block px-5">
                     <p class="text-muted mb-0">🌿 No hay productos destacados cargados en este momento.</p>
                </div>
            </div>
        @endforelse

    </div>

    <div class="text-center mt-4">
        <a href="{{ route('catalogo') }}" class="btn btn-success rounded-pill px-5 py-2">
            Ver todo el catálogo →
        </a>
    </div>

</div>


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

<div class="text-center my-5">
    <p class="fs-5">
        ¿Querés conocernos mejor?
        <a href="/quienes-somos" class="fw-bold text-success text-decoration-none">
            Visitá nuestra historia →
        </a>
    </p>
</div>

</x-layout>