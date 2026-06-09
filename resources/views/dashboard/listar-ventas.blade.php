<x-layout-admin>
    <x-slot:title>Listado de Ventas</x-slot:title>

    <x-slot:barraP>
        <h4>Historial de Ventas</h4>
    </x-slot:barraP>

    <div class="container mt-4">
        <div class="mb-4">
            <h2>Panel de Ventas Realizadas</h2>
            <p class="text-muted">Revisá y controlá los ingresos y pedidos de la tienda.</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Venta</th>
                            <th>Fecha y Hora</th>
                            <th>Cliente</th>
                            <th>Método de Pago</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ventas as $venta)
                            <tr>
                                <td class="fw-bold">#{{ $venta->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($venta->created_at)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }}</td>
                                <td>
                                    {{ $venta->cliente->nombre ?? 'Cliente Desconocido' }} 
                                    {{ $venta->cliente->apellido ?? '' }}
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2 py-1 text-uppercase">
                                        {{ $venta->metodo_pago ?? 'No especificado' }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">
                                    ${{ number_format($venta->total, 2, ',', '.') }}
                                </td>
                                <td>
                                    @if($venta->estadoVenta == 'realizada')
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">
                                            Realizada
                                        </span>
                                    @else
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1 text-uppercase">
                                            {{ $venta->estadoVenta }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalDetalle{{ $venta->id }}">
                                        <i class="bi bi-info-circle me-1"></i> Ver Detalle
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-currency-dollar d-block mb-2" style="font-size: 40px;"></i>
                                    Aún no se han registrado ventas en el sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin> @foreach($ventas as $venta)
    <div class="modal fade" id="modalDetalle{{ $venta->id }}" tabindex="-1" aria-labelledby="modalDetalleLabel{{ $venta->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="modalDetalleLabel{{ $venta->id }}">
                        <i class="bi bi-receipt me-2"></i>Detalle de la Venta #{{ $venta->id }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 bg-light p-3 rounded mx-1">
                        <div class="col-md-6">
                            <strong>Cliente:</strong> {{ $venta->cliente->nombre ?? 'N/A' }} {{ $venta->cliente->apellido ?? '' }}<br>
                            <strong>DNI:</strong> {{ $venta->cliente->dni ?? 'N/A' }}<br>
                            <strong>Teléfono:</strong> {{ $venta->cliente->telefono ?? 'N/A' }}
                        </div>
                        <div class="col-md-6 text-md-end">
                            <strong>Dirección:</strong> {{ $venta->cliente->direccion ?? 'N/A' }}<br>
                            <strong>Ciudad:</strong> {{ $venta->cliente->ciudad ?? 'N/A' }} ({{ $venta->cliente->provincia ?? 'N/A' }})<br>
                            <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($venta->created_at)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Precio Unitario</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($venta->detalles as $detalle)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if(!empty($detalle->producto->imagen))
                                                    <img src="{{ asset('storage/' . $detalle->producto->imagen) }}" alt="" class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                                @endif
                                                <span>{{ $detalle->producto->nombre ?? 'Producto no disponible' }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">${{ number_format($detalle->detalle_precio, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $detalle->detalle_cant }}</td>
                                        <td class="text-end fw-bold">${{ number_format($detalle->detalle_precio * $detalle->detalle_cant, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold fs-5">Total de la Compra:</td>
                                    <td class="text-end fw-bold text-success fs-5">${{ number_format($venta->total, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach