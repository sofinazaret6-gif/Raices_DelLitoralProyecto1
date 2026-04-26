<x-layout>
    <x-slot:title>Nuestros Productos</x-slot:title>

    <x-slot:barraP>
        <h4>{{ strtoupper($categoria ?? 'Catálogo Completo') }}</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <div class="row">
            @forelse ($productos as $producto)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div style="height: 200px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; overflow: hidden;">
                            <img src="{{ asset($producto['imagen']) }}" 
                                 class="card-img-top" 
                                 style="max-height: 100%; width: auto; object-fit: contain;"
                                 alt="{{ $producto['nombre'] }}">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold">{{ $producto['nombre'] }}</h5>
                            <p class="text-muted small">{{ $producto['descripcion'] }}</p>
                            <div class="mt-auto">
                                <p class="text-success fw-bold fs-5">${{ number_format($producto['precio'], 0, ',', '.') }}</p>
                                <a href="#" class="btn btn-success w-100 rounded-pill">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted">No encontramos productos en esta categoría.</h4>
                    <a href="{{ route('catalogo') }}" class="btn btn-primary mt-3">Volver al catálogo</a>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>