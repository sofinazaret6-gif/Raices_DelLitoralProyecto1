<x-layout-admin>
    <x-slot:title>Inicio Panel - Raíces del Litoral</x-slot:title>

    <x-slot:barraP>
        <h4>Menu Principal</h4>
    </x-slot:barraP>

    <div class="container mt-4">
        <div class="mb-4">
            <h2>Panel de Administración</h2>
            <p class="text-muted">Bienvenido de nuevo. Revisá el estado general de la tienda para el día de hoy.</p>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm" style="border-top: 4px solid #198754 !important;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted fw-bold small text-uppercase">Ventas del Mes</span>
                            <i class="bi bi-currency-dollar fs-4 text-success"></i>
                        </div>
                        <h3 class="fw-bold mb-1">${{ number_format($ventasMes, 2, ',', '.') }}</h3>
                        <span class="text-success small"><i class="bi bi-arrow-up-short"></i> total </span>
                    </div>
                </div>
            </div>
                
            <div class="col-md-3">
                <div class="card border-0 shadow-sm" style="border-top: 4px solid #145a32 !important;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted fw-bold small text-uppercase">Ingresos de Hoy</span>
                            <i class="bi bi-graph-up-arrow fs-4" style="color: #097d3b;"></i>
                        </div>
                        <h3 class="fw-bold mb-1">${{ number_format($ventasDia, 2, ',', '.') }}</h3>
                        <span class="text-muted small">Cierre de caja provisional</span>
                    </div>
                </div>
            </div>
              
            <div class="col-md-3">
                <div class="card border-0 shadow-sm" style="border-top: 4px solid #ffc107 !important;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted fw-bold small text-uppercase">Consultas sin Responder</span>
                            <i class="bi bi-envelope-exclamation fs-4 text-warning"></i>
                        </div>
                        <h3 class="fw-bold mb-1">{{ $consultasPendientes }}</h3>
                        <span class="text-muted small">Buzón de entrada</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm" style="border-top: 4px solid #fd1414 !important;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted fw-bold small text-uppercase">Productos con bajo Stock</span>
                            <i class="bi bi-exclamation-triangle fs-4 text-warning"></i>
                        </div>
                        <h3 class="fw-bold mb-1">{{ $bajoStock }}</h3>
                        <span class="text-muted small">Menos de 5 unidades</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-muted"></i>Últimas 5 Ventas Realizadas hoy</h5>
                        <a href="{{ route('admin.ventas') }}" class="btn btn-sm btn-link text-decoration-none">Ver Historial Completo</a>
                    </div>
                    <div class="table-responsive px-3 pb-3">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-muted small">
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha y Hora</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ultimasVentas as $uVenta)
                                    <tr>
                                        <td class="fw-bold">#{{ $uVenta->id }}</td>
                                        <td class="small">{{ \Carbon\Carbon::parse($uVenta->created_at)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m H:i') }} hs</td>
                                        <td>{{ $uVenta->cliente->nombre ?? 'N/A' }} {{ $uVenta->cliente->apellido ?? '' }}</td>
                                        <td class="fw-bold text-success">${{ number_format($uVenta->total, 2, ',', '.') }}</td>
                                        <td>
                                            @if($uVenta->estadoVenta == 'realizada')
                                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 small">Realizada</span>
                                            @else
                                                <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-2 py-1 small text-uppercase">{{ $uVenta->estadoVenta }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No hay ventas registradas recientemente.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm bg-light h-100">
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-3"><i class="bi bi-lightning-charge me-2 text-warning"></i>Acciones Rápidas</h5>
                            <p class="text-muted small">Atajos directos.</p>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('productos.gestionStock') }}" class="btn btn-white border text-start shadow-sm rounded-3 py-2">
                                <i class="bi bi-box-seam me-2 text-primary"></i> Controlar Stock y Visibilidad
                            </a>
                            <a href="/admin/consultas" class="btn btn-white border text-start shadow-sm rounded-3 py-2">
                                <i class="bi bi-chat-left-dots me-2 text-warning"></i> Atender Consultas Web
                            </a>
                            <a href="{{ route('admin.usuarios') }}" class="btn btn-white border text-start shadow-sm rounded-3 py-2">
                                <i class="bi bi-people me-2 text-info"></i> Gestionar Usuarios / Clientes
                            </a>
                        </div>
                        <div class="mt-4 pt-3 border-top text-center text-muted small">
                            Raíces del Litoral © {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>