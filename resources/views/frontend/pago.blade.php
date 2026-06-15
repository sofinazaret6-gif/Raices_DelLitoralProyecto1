
<x-layout>

    <x-slot:title>Método de Pago</x-slot:title>
    <x-slot:barraP><h4>FINALIZAR COMPRA</h4></x-slot:barraP>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="bi bi-credit-card"></i> Método de Pago</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-light border">
                            <h5 class="fw-bold text-success">Resumen de la compra</h5>
                            <p class="mb-1"><strong>Total:</strong> ${{ number_format($total, 0, ',', '.') }}</p>
                            <p class="mb-0"><strong>Estado:</strong> Pendiente de pago</p>
                        </div>

                        <form action="{{ route('compra.pagar') }}" method="POST" id="formPagoFinal">
                            @csrf
                            
                            <h5 class="mt-4 mb-3">Selecciona cómo deseas pagar</h5>

                            <div class="form-check mb-3">
                                <input class="form-check-input radio-pago" type="radio" name="metodo_pago" id="efectivo" value="efectivo" checked>
                                <label class="form-check-label fw-semibold ms-2" for="efectivo">💵 Efectivo / Al retirar</label>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input radio-pago" type="radio" name="metodo_pago" id="tarjeta" value="tarjeta">
                                <label class="form-check-label fw-semibold ms-2" for="tarjeta">💳 Tarjeta de Débito / Crédito</label>
                            </div>

                            <div id="datosTarjeta" class="border rounded p-4 bg-light mb-4" style="display:none;">
                                <h5 class="mb-3 text-success"><i class="bi bi-lock-fill"></i> Datos de la tarjeta</h5>
                                <div class="mb-3">
                                    <label class="form-label fw-medium">Titular de la tarjeta</label>
                                    <input type="text" class="form-control" name="tarjeta_titular" placeholder="Nombre como figura en la tarjeta">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-medium">Número de tarjeta</label>
                                        <input type="text" class="form-control" name="tarjeta_numero" placeholder="1234 5678 9012 3456">
                                    </div>
                                    <div class="col-6 col-md-3 mb-3">
                                        <label class="form-label fw-medium">Vencimiento</label>
                                        <input type="text" class="form-control" name="tarjeta_vence" placeholder="MM/AA">
                                    </div>
                                    <div class="col-6 col-md-3 mb-3">
                                        <label class="form-label fw-medium">CVC</label>
                                        <input type="password" class="form-control" name="tarjeta_cvc" placeholder="123">
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">
                                    <i class="bi bi-check-circle"></i> Finalizar Compra
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const datosTarjeta = document.getElementById('datosTarjeta');
            const radios = document.querySelectorAll('.radio-pago');

            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.id === 'tarjeta') {
                        datosTarjeta.style.display = 'block';
                    } else {
                        datosTarjeta.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-layout>