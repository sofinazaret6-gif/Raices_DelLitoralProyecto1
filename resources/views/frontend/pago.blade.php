<x-layout>

    <x-slot:title>
        Método de Pago
    </x-slot:title>

    <x-slot:barraP>
        <h4>FINALIZAR COMPRA</h4>
    </x-slot:barraP>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="bi bi-credit-card"></i>
                            Método de Pago
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="alert alert-light border">

                            <h5 class="fw-bold text-success">
                                Resumen de la compra
                            </h5>

                            <p class="mb-1">
                                <strong>Total:</strong>
                                ${{ number_format($venta->total, 0, ',', '.') }}
                            </p>

                            <p class="mb-0">
                                <strong>Estado:</strong>
                                Pendiente de pago
                            </p>

                        </div>

                        <form action="{{ route('compra.pagar') }}"
                              method="POST">

                            @csrf

                            <h5 class="mt-4 mb-3">
                                Selecciona cómo deseas pagar
                            </h5>

                            <div class="form-check mb-3">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="metodo_pago"
                                    id="efectivo"
                                    value="efectivo"
                                    checked>

                                <label
                                    class="form-check-label"
                                    for="efectivo">

                                    💵 Efectivo (pago en el local)

                                </label>

                            </div>

                            <div class="form-check mb-4">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="metodo_pago"
                                    id="tarjeta"
                                    value="tarjeta">

                                <label
                                    class="form-check-label"
                                    for="tarjeta">

                                    💳 Tarjeta

                                </label>

                            </div>

                            <!-- DATOS TARJETA -->

                            <div id="datosTarjeta"
                                 class="border rounded p-4 bg-light"
                                 style="display:none;">

                                <h5 class="mb-3">
                                    Datos de la tarjeta
                                </h5>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Titular
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Nombre completo">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Número de tarjeta
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="1234 5678 9012 3456">

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Vencimiento
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="MM/AA">

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            CVV
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="123">

                                    </div>

                                </div>

                                <small class="text-muted">
                                    Estos datos son únicamente demostrativos y no se almacenan.
                                </small>

                            </div>

                            <div class="text-end mt-4">

                                <button
                                    type="submit"
                                    class="btn btn-success btn-lg">

                                    <i class="bi bi-check-circle"></i>
                                    Confirmar Pago

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        const efectivo =
            document.getElementById('efectivo');

        const tarjeta =
            document.getElementById('tarjeta');

        const datosTarjeta =
            document.getElementById('datosTarjeta');

        function mostrarFormularioTarjeta()
        {
            if (tarjeta.checked) {

                datosTarjeta.style.display = 'block';

            } else {

                datosTarjeta.style.display = 'none';
            }
        }

        efectivo.addEventListener(
            'change',
            mostrarFormularioTarjeta
        );

        tarjeta.addEventListener(
            'change',
            mostrarFormularioTarjeta
        );

    </script>

</x-layout>