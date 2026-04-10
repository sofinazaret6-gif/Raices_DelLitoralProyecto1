<x-layout>


<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

<style>
    /* Clase para el fondo blanco semitransparente */
    .contenedor-blanco {
        background-color: rgba(255, 255, 255, 0.85); /* 0.85 es el nivel de transparencia */
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(4px); /* Suaviza la imagen de fondo detrás del cuadro */
    }
</style>

<x-slot:title>Principal</x-slot:title>

    <x-slot:barraP>
        <h4> Vivero en Corrientes </h4>
    </x-slot:barraP>

<div class="container-fluid px-5"> <!-- Cambiado a container-fluid para más ancho -->
    <div class="row gx-4 align-items-stretch"> <!-- align-items-stretch iguala las alturas -->
        
        <!-- Columna Izquierda: Texto -->
        <div class="col-lg-6 mb-4">
            <div class="contenedor-blanco h-100 d-flex flex-column justify-content-center p-4">
                <h2 style="color:black;" class="fw-bold">¡Bienvenidos a Nuestra Página Web!</h2>
                <h3 style="color:black; font-size: 1.05rem; line-height: 1.5; font-weight: normal;" class="mb-0">
                    <strong>Bienvenidos a Raíces del Litoral: El Corazón Verde de Corrientes</strong><br><br>
                    En el litoral sabemos que un jardín es mucho más que un espacio exterior; es nuestro refugio, 
                    el lugar donde compartimos el mate y donde la naturaleza nos regala su frescura frente al intenso sol correntino. 
                    En <strong>Raíces del Litoral</strong>, nacimos con la misión de acompañarte en la creación de ese rincón especial.
                    <br><br>
                    <strong>Cultivamos vida con identidad litoraleña</strong><br>
                    Nuestra selección está pensada estratégicamente para el clima de nuestra provincia. Desde los vibrantes 
                    Lapachos y Jacarandás hasta delicadas plantas de interior, cada ejemplar es cuidado con dedicación.
                    <br><br>
                    Entendemos los desafíos de cultivar en Corrientes: el calor y la humedad del Paraná. Por eso, te ofrecemos 
                    asesoramiento experto para que tu planta prospere temporada tras temporada.
                </h3>
            </div>
        </div>

        <!-- Columna Derecha: Fotos Panorámicas -->
        <div class="col-lg-6 mb-4">
            <div class="contenedor-blanco h-100 d-flex flex-column justify-content-center p-4">
                <img src="{{ asset('images/fotoSubir.jpg') }}" 
                     class="img-fluid rounded shadow mb-3 w-100" 
                     style="height: 180px; object-fit: cover;" 
                     alt="Imagen Vivero">
                
                <img src="{{ asset('images/tiendaPlantas.jpg') }}" 
                     class="img-fluid rounded shadow w-100" 
                     style="height: 180px; object-fit: cover;" 
                     alt="Plantas Corrientes">
            </div>
        </div>

    </div>
</div>
</x-layout>


