<x-layout-admin>
    <x-slot:title>Gestión de Usuarios - Raíces del Litoral</x-slot:title>

    <x-slot:barraP>
        <h4>Usuarios Registrados</h4>
    </x-slot:barraP>

    <div class="container mt-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2>Lista de Personas / Usuarios</h2>
                <p class="text-muted mb-0">Gestioná los clientes y el personal registrado en el sistema.</p>
            </div>
            <div class="bg-light border rounded px-3 py-2 text-center shadow-sm">
                <span class="text-muted small fw-bold text-uppercase d-block">Total Registrados</span>
                <h4 class="fw-bold mb-0 text-primary">{{ $usuarios->count() }}</h4>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="table-responsive px-3 py-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>DNI / Rol</th>
                            <th>Contacto</th>
                            <th>Ubicación</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                            <tr>
                                <td class="fw-bold text-secondary">#{{ $usuario->id }}</td>
                                
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px;">
                                            <i class="bi bi-person-fill fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold d-block">{{ $usuario->nombre }} {{ $usuario->apellido }}</span>
                                            <span class="text-muted small">Reg: {{ $usuario->created_at ? \Carbon\Carbon::parse($usuario->created_at)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y') : 'S/D' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <span class="d-block small fw-bold text-secondary">DNI: {{ $usuario->dni ?? 'N/C' }}</span>
                                    
                                    {{-- Validación estricta para identificar administradores --}}
                                    @if(
                                        $usuario->id_perfil == 1 || 
                                        $usuario->email === 'admin@admin.com' || 
                                        str_contains(strtolower($usuario->nombre ?? ''), 'admin') || 
                                        (isset($usuario->perfil) && str_contains(strtolower($usuario->perfil->nombre_perfil ?? $usuario->perfil->nombre ?? ''), 'admin'))
                                    )
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1 small mt-1 fw-bold">
                                            <i class="bi bi-shield-lock-fill me-1"></i>Administrador
                                        </span>
                                    @else
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2 py-1 small mt-1">
                                            {{ $usuario->perfil->nombre_perfil ?? $usuario->perfil->nombre ?? 'Usuario' }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="mailto:{{ $usuario->email }}" class="text-decoration-none text-dark d-block small mb-1">
                                        <i class="bi bi-envelope text-muted me-1"></i> {{ $usuario->email }}
                                    </a>
                                    @if($usuario->telefono)
                                        <span class="text-muted small">
                                            <i class="bi bi-telephone me-1"></i> {{ $usuario->telefono }}
                                        </span>
                                    @endif
                                </td>

                                <td class="small">
                                    @if($usuario->ciudad || $usuario->provincia)
                                        <span class="d-block text-dark">{{ $usuario->ciudad ?? '' }}, {{ $usuario->provincia ?? '' }}</span>
                                        <span class="text-muted text-truncate d-inline-block" style="max-width: 180px;">{{ $usuario->direccion ?? '' }}</span>
                                    @else
                                        <span class="text-muted italic">No cargada</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if($usuario->estado == 'activo' || $usuario->estado === 1 || is_null($usuario->estado))
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 small">Activo</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1 small">Inactivo</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-people fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No hay ninguna persona registrada en la base de datos todavía.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>