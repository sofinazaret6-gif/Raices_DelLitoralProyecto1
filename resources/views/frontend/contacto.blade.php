<x-layout>
    <x-slot:title>Contacto</x-slot:title>

    <x-slot:barraP>
        <h4>Contacto</h4>
    </x-slot:barraP>
<div class="row g-4">

   <!-- COLUMNA IZQUIERDA: INFORMACIÓN -->
    <div class="col-md-6">
        <div class="card-custom fade-in">
             <!-- Título -->
            <h2 class="h2 fw-bold mb-2" style="color: #27ae60">Información de Contacto</h2>
            <p class="mb-4">
                ¿Tenés una consulta? Estamos para ayudarte. Podés comunicarte con nosotros o ir directamente al formulario.
            </p>
            <!-- Datos -->
            <div class="info-item">
                <strong>Titular:</strong> Dorrego Octavio,Ferretti Sofia
            </div>

            <div class="info-item">
                <strong>Razón Social:</strong> Raíces del Litoral S.A.
            </div>

            <div class="info-item">
                <strong>Domicilio:</strong> Av. Cazadores Correntinos 2325, Corrientes
            </div>

            <div class="info-item">
                <strong>Tel:</strong> +54 3794 778248
            </div>

            <div class="info-item">
                <strong>Email:</strong> raicesdellitoral@gmail.com
            </div>
             <!-- Botón al formulario -->
            <a href="/consultas" class="btn btn-verde mt-4">
                Ir a Consultas
            </a>

        </div>
    </div>

     <!-- COLUMNA DERECHA: IMAGEN -->
    <div class="col-md-6">
        <div class="card-custom fade-in position-relative overflow-hidden">
           <!-- Imagen del vivero -->
            <img src="/images/vivero-contacto.png" class="img-fluid img-hover">

            <!-- Texto sobre la imagen -->
            <div class="overlay-info">
                <h5>Estamos cerca tuyo 🌿</h5>
                <p>Respondemos rápido y te asesoramos</p>
            </div>

        </div>
    </div>

</div>
<!-- UBICACIÓN -->
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-lg rounded-4 border-0">

            <div class="card-body text-center">
                 <!-- Título -->
                <h2 class="fw-bold mb-3" style="color: #27ae60;">
                    📍 Nuestra Ubicación
                </h2>

                <div class="rounded-3 overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps?q=Av.+Cazadores+Correntinos+2325,+Corrientes,+Argentina&output=embed"
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
</x-layout>