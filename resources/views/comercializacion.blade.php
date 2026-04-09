@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

@section('title', 'Catalogo')
@section('BarraP')
 <h2 class="m-0 py-2">Información Comercial</h2>

 @endsection

 @section('content')
   <p class="lead fs-5">En <strong>Raíces del Litoral</strong> queremos que tu experiencia sea simple, transparente y confiable. A continuación, te explicamos cómo adquirir nuestros productos:</p>

    <div class="accordion mt-4" id="accordionComercializacion">
        
        <!-- Venta -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    🌱 Venta Minorista y Mayorista
                </button>
            </h3>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionComercializacion">
                <div class="accordion-body">
                    <p>Realizamos ventas tanto por unidad como al por mayor.</p>
                    <p>Ofrecemos precios especiales para paisajistas, viveristas, revendedores e instituciones. Si necesitás grandes cantidades, podés contactarnos para recibir una cotización personalizada.</p>
                </div>
            </div>
        </div>

        <div class="accordion-item">
    <h3 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            💳 Métodos de Pago
        </button>
    </h3>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionComercializacion">
        <div class="accordion-body">
            <div class="row align-items-center">
                <!-- Columna de 4 -->
                <div class="col-md-4 text-center border-end">
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <img src="{{ asset('images/visa.png') }}" alt="Visa" style="height: 30px;">
                        <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard" style="height: 30px;">
                        <img src="{{ asset('images/mercadoPago.png') }}" alt="Mercado Pago" style="height: 30px;">
                        <img src="{{ asset('images/bancoCo.png') }}" alt="BanCo" style="height: 25px;">
                    </div>
                    <p class="small text-muted mt-2">Aceptamos todas las tarjetas</p>
                </div>

                <!--  detalle del texto -->
                <div class="col-md-8 ps-md-4">
                    <p>Aceptamos diferentes formas de pago para tu comodidad:</p>
                    <ul class="mb-0">
                        <li><strong>Efectivo:</strong> 10% de descuento especial en el vivero.</li>
                        <li><strong>Transferencia bancaria:</strong> Consultanos el CBU por WhatsApp.</li>
                        <li><strong>Mercado Pago:</strong> Dinero en cuenta o link de pago.</li>
                        <li><strong>Tarjetas:</strong> Débito y Crédito (consultar cuotas).</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

        <!--  Envíos -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    🚚 Logística y Envíos
                </button>
            </h3>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionComercializacion">
                <div class="accordion-body">
                    <p><strong>Realizamos envíos programados en distintas zonas:</strong></p>
                    <ul>
                        <li>Corrientes Capital (días a coordinar)</li>
                        <li>Laguna Brava, Santa Ana y Paso de la Patria</li>
                    </ul>
                    <p><strong>Costo de envío:</strong></p>
                    <ul>
                        <li>Sin cargo en compras superiores a un monto determinado.</li>
                        <li>Para pedidos menores, se aplica un costo fijo según la zona.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  Retiro -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    📦 Retiro en Vivero
                </button>
            </h3>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionComercializacion">
                <div class="accordion-body">
                    <p>También podés retirar tu pedido directamente en nuestro vivero físico.</p>
                    <p><strong>Horario de atención:</strong> A coordinar previamente para asegurar la preparación de tu compra.</p>
                </div>
            </div>
        </div>

        <!--  Sanidad -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    ✅ Garantía de Sanidad
                </button>
            </h3>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionComercializacion">
                <div class="accordion-body">
                    <p>Todas nuestras plantas se entregan:</p>
                    <ul>
                        <li>Libres de plagas.</li>
                        <li>En óptimas condiciones.</li>
                        <li>Aclimatadas al clima cálido y húmedo de la región.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
 @endsection