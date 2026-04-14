<x-layout>

    <x-slot:title>Términos y Condiciones</x-slot:title>

    <x-slot:barraP>
        <h4> </h4>
    </x-slot:barraP>

    <style>
        .accordion-button:not(.collapsed) {
            background-color: #198754;
            color: white;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: #198754;
        }

        .accordion-button:hover {
            background-color: #157347;
            color: white;
        }
    </style>

    <div class="container mt-5">

        <h2 class="mb-4 text-center">Términos y Condiciones</h2>

        <div class="accordion" id="accordionTerminos">

            <!-- Uso del sitio -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#uno">
                        Uso del sitio
                    </button>
                </h2>
                <div id="uno" class="accordion-collapse collapse show" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        El usuario se compromete a utilizar este sitio de manera responsable, evitando acciones que puedan afectar su funcionamiento.
                    </div>
                </div>
            </div>

            <!-- Información -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dos">
                        Información
                    </button>
                </h2>
                <div id="dos" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        La información presentada es de carácter informativo y puede modificarse sin previo aviso.
                    </div>
                </div>
            </div>

            <!-- Consultas -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tres">
                        Consultas
                    </button>
                </h2>
                <div id="tres" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        Los datos enviados mediante formularios serán utilizados únicamente para responder consultas y brindar asesoramiento.
                    </div>
                </div>
            </div>

            <!-- Privacidad -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuatro">
                        Privacidad
                    </button>
                </h2>
                <div id="cuatro" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        Nos comprometemos a proteger los datos personales y no compartirlos con terceros sin consentimiento del usuario.
                    </div>
                </div>
            </div>

            <!-- Responsabilidad -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cinco">
                        Responsabilidad
                    </button>
                </h2>
                <div id="cinco" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        No nos hacemos responsables por daños derivados del uso incorrecto del sitio.
                    </div>
                </div>
            </div>

            <!-- Proyecto académico -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seis">
                        Carácter académico del sitio
                    </button>
                </h2>
                <div id="seis" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        Este sitio web fue desarrollado con fines exclusivamente educativos como parte de un proyecto académico para la materia Taller de Programación I de la Universidad Nacional del Nordeste (UNNE). 
                        No posee fines comerciales ni constituye una plataforma real de transacciones.
                    </div>
                </div>
            </div>

            <!-- Modificaciones -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#siete">
                        Modificaciones
                    </button>
                </h2>
                <div id="siete" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                    <div class="accordion-body">
                        Nos reservamos el derecho de modificar estos términos en cualquier momento sin previo aviso.
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-layout>