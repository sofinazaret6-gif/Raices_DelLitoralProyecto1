<x-layout>
   
    <x-slot:title>Consultas</x-slot:title>

    <x-slot:barraP>
        <h4>Realizá tu consulta</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <!-- Título del formulario -->
        <h2>CONSULTANOS</h2>
      <!-- Formulario -->
        <form action="{{ url('/contacto') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <!-- TIPO DE CONSULTA (DROPDOWN) -->
            <div class="mb-3">
                <label class="form-label">Tipo de consulta</label>

                <div class="dropdown">
                    <!-- Botón que muestra la opción elegida -->
                    <button id="btnTipo" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Seleccionar tipo
                    </button>
                     <!-- Opciones -->
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#" onclick="setTipo('Consulta')">Consulta</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setTipo('Asesoramiento')">Asesoramiento</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setTipo('Sugerencia')">Sugerencia</a>
                        </li>
                    </ul>
                </div>

                <!-- INPUT OCULTO, GUARDA VALOR-->
                <input type="hidden" name="tipo" id="tipoSeleccionado">
            </div>
             <!-- Mensaje -->
            <div class="mb-3">
                <label class="form-label">Consulta</label>
                <textarea class="form-control" name="consulta" rows="4"></textarea>
            </div>
              <!-- Botón enviar -->
            <button type="submit" class="btn btn-primary">
                Enviar
            </button>

        </form>
    </div>

    <!-- SCRIPT PARA GUARDAR OPCION ELEGIDA -->
    <script>
        function setTipo(valor) {
            document.getElementById('tipoSeleccionado').value = valor;
            document.getElementById('btnTipo').innerText = valor;
        }
    </script>

</x-layout>