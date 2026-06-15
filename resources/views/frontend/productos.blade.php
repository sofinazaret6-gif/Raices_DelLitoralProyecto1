<x-layout>
    <x-slot:title>Nuestros Productos</x-slot:title>
    
    <x-slot:barraP>
        <h4>{{ strtoupper(is_object($categoria) ? $categoria->descripcion : ($categoria ?? 'Catálogo Completo')) }}</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            @forelse ($productos as $producto)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div style="height: 200px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; overflow: hidden;">
                            
                            @if(str_contains($producto->imagen, 'images/'))
                                <img src="{{ asset($producto->imagen) }}" class="card-img-top" style="max-height: 100%; width: auto; object-fit: contain;" alt="{{ $producto->nombre }}">
                            @else
                                <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" style="max-height: 100%; width: auto; object-fit: contain;" alt="{{ $producto->nombre }}">
                            @endif

                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold">{{ $producto->nombre }}</h5>
                            <p class="text-muted small">{{ $producto->descripcion }}</p>
                            <div class="mt-auto">

                                <p class="text-success fw-bold fs-5">
                                    ${{ number_format($producto->precio, 0, ',', '.') }}
                                </p>

                                @php
                                    $carrito = session('carrito', []);
                                @endphp

                                @if($producto->stock <= 0)
                                    <button class="btn btn-danger w-100 rounded-pill" disabled>
                                        Sin stock
                                    </button>
                                @elseif(isset($carrito[$producto->id]))
                                    <button class="btn btn-secondary w-100 rounded-pill" disabled>
                                        Ya agregado
                                    </button>
                                @else
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100 rounded-pill">
                                            Agregar al carrito
                                        </button>
                                    </form>
                                @endif

                                <small class="text-muted d-block mt-2">
                                    Stock disponible: {{ $producto->stock }}
                                </small>

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