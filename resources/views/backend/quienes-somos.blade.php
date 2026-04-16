<x-layout>

<x-slot:title>Quiénes Somos</x-slot:title>

<x-slot:barraP>
    <h2 class="m-0 py-2 text-center">Sobre nosotros</h2>
</x-slot:barraP>

<div class="container py-5">
    <div class="row align-items-center">

        <!-- TEXTO -->
        <div class="col-md-6 mb-4">
            <div class="text-center shadow-lg p-5 rounded-4 bg-white bg-opacity-75">
                
                <h1 class="display-4 fw-bold mb-4" style="color: #27ae60;">Raíces del Litoral</h1>
                
                <p class="lead fs-4 mb-4">
                    Desde el corazón de <strong>Corrientes</strong>, cultivamos vida y compartimos la esencia de nuestra tierra con vos.
                </p>
                
                <div class="row g-4 text-start">
                    <div class="col-6">
                        <ul class="list-unstyled fs-5">
                            <li>🌿 <strong>Plantas Frutales:</strong> Cítricos y nativas listas para dar fruto.</li>
                            <li>🌸 <strong>Aromas únicos:</strong> Plantas aromáticas para tu jardín.</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled fs-5">
                            <li>🌱 <strong>Insumos:</strong> Tierra fértil y abonos orgánicos.</li>
                            <li>🏡 <strong>Asesoramiento:</strong> Te ayudamos a que tu rincón verde prospere.</li>
                        </ul>
                    </div>
                </div>

                <hr class="my-4" style="border-color: #27ae60;">

                <p class="fs-5 mb-4">
                    "No solo vendemos plantas, entregamos un pedacito de la naturaleza correntina en cada maceta."
                </p>

                <a href="{{ url('/comercializacion') }}" 
                   class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow-sm"
                   style="background-color: #27ae60; border: none;">
                    Ver Productos
                </a>

            </div>
        </div>

        <!-- MAPA EN TARJETA -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg rounded-4 border-0">

                <div class="card-body text-center">
                    <h1 class="display-4 fw-bold mb-2" style="color: #27ae60;">📍Nuestra Ubicacion</h1>

                    <div class="rounded-3 overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps?q=Corrientes,Argentina&output=embed"
                            width="100%" 
                            height="350" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

</x-layout>