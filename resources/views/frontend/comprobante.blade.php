<x-layout>

    <x-slot:title>
        Comprobante de Compra
    </x-slot:title>

    <x-slot:barraP>
        <h4>COMPROBANTE DE COMPRA</h4>
    </x-slot:barraP>

    <div class="container py-5">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    <i class="bi bi-receipt"></i>
                    Comprobante N° {{ $venta->id }}
                </h4>
            </div>

           <div class="card-body">

    @if($venta->metodo_pago == 'efectivo')

        <div class="alert alert-warning shadow-sm">

            <h5 class="mb-1">
                <i class="bi bi-exclamation-circle"></i>
                Pago pendiente
            </h5>

            El pedido fue registrado correctamente y deberá abonarse en efectivo al momento de la entrega o retiro.

        </div>

    @else

        <div class="alert alert-success shadow-sm">

            <h5 class="mb-1">
                <i class="bi bi-check-circle-fill"></i>
                Pago confirmado
            </h5>

            La compra fue realizada correctamente y el pago fue registrado.

        </div>

    @endif

    <div class="row mb-4">

        <div class="col-md-6">

            <p>
                <strong>Fecha:</strong>
                {{ $venta->fecha }}
            </p>

            <p>
                <strong>Método de pago:</strong>
                {{ ucfirst($venta->metodo_pago) }}
            </p>

        </div>

        <div class="col-md-6">

            <p>
                <strong>Estado:</strong>
                {{ ucfirst($venta->estadoVenta) }}
            </p>

            <p>
                <strong>Total:</strong>
                ${{ number_format($venta->total, 0, ',', '.') }}
            </p>

        </div>

    </div>

                <h5 class="mb-3">
                    Productos comprados
                </h5>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead class="table-success">

                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
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
                                            $detalle->detalle_cant * $detalle->detalle_precio,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="text-end mt-4">

                    <h4 class="text-success">
                        Total:
                        ${{ number_format($venta->total, 0, ',', '.') }}
                    </h4>

                </div>

                <div class="text-center mt-4">

                    <a href="{{ route('principal') }}"
                       class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-house"></i>
                        Volver al inicio

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layout>