<x-layout-admin

<x-slot:title>
    Panel de Consultas
</x-slot:title>

<x-slot:barraP>
    <h4>Consultas Recibidas</h4>
</x-slot:barraP>

<div class="container mt-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">
                Lista de consultas
            </h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Motivo</th>
                        <th>Consulta</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($consultas as $consulta)

                        <tr>

                            <td>{{ $consulta->id }}</td>

                            <td>
                                {{ $consulta->nombre }} {{ $consulta->apellido }}
                            </td>

                            <td>{{ $consulta->email }}</td>

                            <td>{{ $consulta->motivo }}</td>

                            <td>{{ $consulta->consulta }}</td>

                            <td>
                                @if($consulta->estado_consulta == 'pendiente')
                                    <span class="badge bg-danger">Pendiente</span>
                                @else
                                    <span class="badge bg-success">Respondida</span>
                                @endif
                            </td>

                            {{-- ACCIÓN --}}
                            <td>

                                @if($consulta->estado_consulta == 'pendiente')

                                    <form action="{{ route('consultas.responder', $consulta->id) }}"
                                          method="POST"
                                          onsubmit="abrirMail('{{ $consulta->email }}')">

                                        @csrf

                                        <button type="submit"
                                                class="btn btn-primary btn-sm">

                                            Responder

                                        </button>

                                    </form>

                                @else

                                    <span class="text-success">
                                        Respondida
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center">
                                No hay consultas registradas
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>
function abrirMail(email) {
    setTimeout(() => {
        window.open(
            'mailto:' + email + '?subject=Respuesta a su consulta',
            '_blank'
        );
    }, 100);
}
</script>

</x-layout-admin>