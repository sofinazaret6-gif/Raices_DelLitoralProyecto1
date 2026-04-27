<x-layout>

<x-slot:title>Comercialización</x-slot:title>

<x-slot:barraP>
    <h4>Comercializacion</h4>
</x-slot:barraP>

<style>
    /* Color del botón activo del acordeón */
    .accordion-button:not(.collapsed) {
        background-color: #198754;
        color: white;
    }
      /* Quita el borde azul al hacer foco */
    .accordion-button:focus {
        box-shadow: none;
        border-color: #198754;
    }
     /* Efecto hover en botones */
    .accordion-button:hover {
        background-color: #157347;
        color: white;
    }
</style>

<div class="container mt-5">

    <p class="lead fs-5 text-center mb-4">
        En <strong>Raíces del Litoral</strong> queremos que tu experiencia sea simple, transparente y confiable.
        A continuación, te explicamos cómo adquirir nuestros productos.
    </p>
         <h1 class="display-4 fw-bold mb-2" style="color: #033d1b;">           Información de compra</h1>
    
      <!-- Acordeón -->
    <div class="accordion" id="accordionTerminos">

        <!-- VENTAS -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#uno">
                    🌱 Venta Minorista y Mayorista
                </button>
            </h2>
            <div id="uno" class="accordion-collapse collapse show" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>Realizamos ventas tanto por unidad como al por mayor.</p>
                    <p>Ofrecemos precios especiales para paisajistas, viveristas, revendedores e instituciones.</p>
                </div>
            </div>
        </div>

        <!-- PAGOS -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dos">
                    💳 Métodos de Pago
                </button>
            </h2>
            <div id="dos" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">

                    <div class="row align-items-center">

                        <!-- ICONOS -->
                        <div class="col-md-4 text-center border-end">
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <img src="{{ asset('images/visa.png') }}" style="height: 30px;">
                                <img src="{{ asset('images/mastercard.png') }}" style="height: 30px;">
                                <img src="{{ asset('images/mercadoPago.png') }}" style="height: 30px;">
                                <img src="{{ asset('images/bancoCo.png') }}" style="height: 25px;">
                            </div>
                            <p class="small text-muted mt-2">Aceptamos todas las tarjetas</p>
                        </div>

                        <!-- TEXTO -->
                        <div class="col-md-8">
                            <p>Aceptamos diferentes formas de pago:</p>
                            <ul class="mb-0">
                                <li><strong>Efectivo:</strong> 10% de descuento.</li>
                                <li><strong>Transferencia:</strong> Consultanos el CBU.</li>
                                <li><strong>Mercado Pago:</strong> Link de pago.</li>
                                <li><strong>Tarjetas:</strong> Débito y crédito.</li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ENVIOS -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tres">
                    🚚 Logística y Envíos
                </button>
            </h2>
            <div id="tres" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p><strong>Realizamos envíos en:</strong></p>
                    <ul>
                        <li>Corrientes Capital</li>
                        <li>Laguna Brava, Santa Ana y Paso de la Patria</li>
                    </ul>

                    <p><strong>Costo:</strong></p>
                    <ul>
                        <li>Gratis en compras grandes</li>
                        <li>Costo fijo para pedidos menores</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- RETIRO -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuatro">
                    📦 Retiro en Vivero
                </button>
            </h2>
            <div id="cuatro" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>Podés retirar tu pedido directamente en nuestro vivero.</p>
                    <p><strong>Horario:</strong> A coordinar previamente.</p>
                </div>
            </div>
        </div>

        <!-- GARANTIA -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cinco">
                    ✅ Garantía de Sanidad
                </button>
            </h2>
            <div id="cinco" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <ul>
                        <li>Plantas libres de plagas</li>
                        <li>En óptimas condiciones</li>
                        <li>Adaptadas al clima local</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>

</x-layout>