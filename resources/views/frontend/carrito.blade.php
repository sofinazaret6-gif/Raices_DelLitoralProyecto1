<x-layout>
    <x-slot:title>Carrito - Raíces del Litoral</x-slot:title>

    <x-slot:barraP>
        <h4>CARRITO DE COMPRAS</h4>
    </x-slot:barraP>

    <div class="container mt-5">

        <h2 class="mb-4 fw-bold text-success">
            <i class="bi bi-cart3"></i> Mi carrito
        </h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
       
        @if(session('error'))
           <div class="alert alert-danger">
              {{ session('error') }}
                </div>
        @endif

        @if(empty($carrito))
            <div class="alert alert-info shadow-sm">
                Tu carrito está vacío.
            </div>
        @else

            @php
                $total = 0;
            @endphp

            <div class="card shadow-sm border-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th style="width: 150px;">Cantidad</th>
                                <th>Subtotal</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($carrito as $idProducto => $item)

                                @php
                                    $subtotal = $item['precio'] * $item['cantidad'];
                                    $total += $subtotal;
                                @endphp

                                <tr>
                                    <td>
                                        @if(str_contains($item['imagen'], 'images/'))
                                            <img src="{{ asset($item['imagen']) }}"
                                                 alt="{{ $item['nombre'] }}"
                                                 class="img-thumbnail"
                                                 style="width: 70px; height: 70px; object-fit: contain;">
                                        @else
                                            <img src="{{ asset('storage/' . $item['imagen']) }}"
                                                 alt="{{ $item['nombre'] }}"
                                                 class="img-thumbnail"
                                                 style="width: 70px; height: 70px; object-fit: contain;">
                                        @endif
                                    </td>
                                    <td class="fw-semibold">
                                        {{ $item['nombre'] }}
                                    </td>

                                    <td>
                                        ${{ number_format($item['precio'], 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <form action="{{ route('carrito.actualizar', $idProducto) }}"
                                              method="POST"
                                              class="d-flex gap-2">
                                            @csrf
                                            @method('PUT')

                                            <input type="number"
                                                   name="cantidad"
                                                   value="{{ $item['cantidad'] }}"
                                                   min="1"
                                                   max="{{ $item['stock'] }}"
                                                   class="form-control"
                                                   style="width:90px;"
                                                   onchange="this.form.submit();">
                                            <small class="text-muted">
                                                Stock disponible: {{ $item['stock'] }}
                                            </small>
                                        </form>
                                    </td>

                                    <td class="fw-bold text-success">
                                        ${{ number_format($subtotal, 0, ',', '.') }}
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('carrito.eliminar', $idProducto) }}"
                                              method="POST"
                                              class="mt-2">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                        <tfoot>
                            <tr class="table-light">
                                <td colspan="3" class="text-end fw-bold fs-5">
                                    Total:
                                </td>
                                <td colspan="2" class="fw-bold fs-5 text-success">
                                    ${{ number_format($total, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <form action="{{ route('carrito.vaciar') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                        <i class="bi bi-trash"></i> Vaciar carrito
                    </button>
                </form>

                <form action="{{ route('carrito.finalizar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        <i class="bi bi-check-circle"></i> Finalizar compra
                    </button>
                </form>
            </div>

        @endif

    </div>

    @if(session('confirmando_compra') && $persona)

        <div class="modal fade"
             id="confirmarCompraModal"
             tabindex="-1"
             aria-labelledby="confirmarCompraLabel"
             aria-hidden="true"
             data-bs-backdrop="false">

            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">

                    <div class="modal-header bg-success text-white py-2">
                        <h5 class="modal-title fw-bold" id="confirmarCompraLabel">
                            <i class="bi bi-check-circle me-2"></i>
                            Confirmar Compra
                        </h5>
                        <a href="{{ route('carrito') }}" class="btn-close btn-close-white" aria-label="Close"></a>
                    </div>

                    <div class="modal-body p-4">
                        <h6 class="fw-bold text-success mb-3">Datos de envío</h6>

                        <p class="mb-1">
                            <strong>Cliente:</strong> {{ $persona->nombre }} {{ $persona->apellido }}
                        </p>
                        <p class="mb-1">
                            <strong>DNI:</strong> {{ $persona->dni }}
                        </p>
                        <p class="mb-1">
                            <strong>Teléfono:</strong> {{ $persona->telefono }}
                        </p>
                        <p class="mb-1">
                            <strong>Dirección:</strong> {{ $persona->direccion }}
                        </p>
                        <p class="mb-3">
                            {{ $persona->ciudad }}, {{ $persona->provincia }} ({{ $persona->codigo_postal }})
                        </p>

                        <div class="alert alert-success py-2 mb-0">
                            Revisá los datos antes de confirmar la compra.
                        </div>
                    </div>

                    <div class="modal-footer bg-light py-2 justify-content-between">
                        <form action="{{ route('carrito.cancelar_confirmacion') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-secondary rounded-pill px-3">
                                Cancelar
                            </button>
                        </form>

                        <div class="d-flex gap-2">
                            <a href="{{ route('perfil') }}" class="btn btn-outline-primary rounded-pill px-3">
                                <i class="bi bi-pencil-square me-1"></i> Editar datos
                            </a>

                            <form action="{{ route('compra.confirmar') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-success rounded-pill px-4">
                                    <i class="bi bi-bag-check me-1"></i> Confirmar Compra
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const modal = new bootstrap.Modal(document.getElementById('confirmarCompraModal'));
                modal.show();
            });
        </script>

    @endif

</x-layout>