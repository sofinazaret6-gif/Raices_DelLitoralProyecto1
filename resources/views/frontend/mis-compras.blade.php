<x-layout>

    <x-slot:title>
        Mis Compras
    </x-slot:title>

    <x-slot:barraP>
        <h4>MIS COMPRAS</h4>
    </x-slot:barraP>

    <div class="container py-5">

        <h2 class="fw-bold text-success mb-4">
            <i class="bi bi-bag-check-fill"></i>
            Historial de Compras
        </h2>

        @if($ventas->isEmpty())

            <div class="alert alert-info">
                Todavía no realizaste ninguna compra.
            </div>

        @else

            <div class="card shadow-sm border-0">

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead class="table-success">

                            <tr>
                                <th>N° Venta</th>
                                <th>Fecha y Hora</th>
                                <th>Método Pago</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($ventas as $venta)

                                <tr>

                                    <td>
                                        #{{ $venta->id }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($venta->created_at)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs
                                    </td>

                                    <td>
                                        {{ ucfirst($venta->metodo_pago) }}
                                    </td>

                                    <td class="fw-bold text-success">
                                        ${{ number_format($venta->total, 0, ',', '.') }}
                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-outline-success btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#comprobante{{ $venta->id }}"
                                            type="button">
                                            Ver comprobante
                                        </button>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif

    </div>

    @foreach($ventas as $venta)

    <div class="modal fade"
         id="comprobante{{ $venta->id }}"
         tabindex="-1"
         data-bs-backdrop="false">

        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content">

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        Comprobante de Compra #{{ $venta->id }}
                    </h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <p>
                        <strong>Fecha y Hora:</strong>
                        {{ \Carbon\Carbon::parse($venta->created_at)->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }} hs
                    </p>

                    <p>
                        <strong>Método de Pago:</strong>
                        {{ ucfirst($venta->metodo_pago) }}
                    </p>

                    <hr>

                    <table class="table table-striped">

                        <thead class="table-success">

                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($venta->detalles as $detalle)

                                <tr>

                                    <td>
                                        {{ $detalle->producto->nombre }}
                                    </td>

                                    <td>
                                        {{ $detalle->detalle_cant }}
                                    </td>

                                    <td>
                                        ${{ number_format($detalle->detalle_precio, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        ${{ number_format(
                                            $detalle->detalle_precio * $detalle->detalle_cant,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <div class="text-end mt-3">

                        <h4 class="text-success fw-bold">
                            Total:
                            ${{ number_format($venta->total, 0, ',', '.') }}
                        </h4>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cerrar
                    </button>

                </div>

            </div>

        </div>

    </div>

    @endforeach

    <style>
    .modal-backdrop {
        display: none !important;
    }
    </style>

</x-layout>