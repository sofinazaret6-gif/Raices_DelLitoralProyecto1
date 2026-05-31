<x-layout>
    
    <x-slot:title>Consultas</x-slot:title

    <x-slot:barraP>
        <h4>Realizá tu consulta</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <!-- Título del formulario -->
        <h2>CONSULTANOS</h2>
          @if ($errors->any())
         <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
          </div>
       @endif
        <!-- Formulario -->
        <form action="{{ url('/contacto') }}" method="POST">
            @csrf


   @if(session()->has('id_usuario'))

    <!-- NOMBRE -->
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text"
               class="form-control"
               name="nombre"
               value="{{ session('nombre_usuario') }}"
               readonly>
    </div>

    <!-- APELLIDO -->
    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text"
               class="form-control"
               name="apellido"
               value="{{ session('apellido_usuario') }}"
               readonly>
    </div>

    <!-- EMAIL -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               class="form-control"
               name="email"
               value="{{ session('email_usuario') }}"
               readonly>
    </div>

@else

    <!-- NOMBRE -->
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text"
               class="form-control @error('nombre') is-invalid @enderror"
               name="nombre"
               value="{{ old('nombre') }}">

        @error('nombre')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- APELLIDO -->
    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text"
               class="form-control @error('apellido') is-invalid @enderror"
               name="apellido"
               value="{{ old('apellido') }}">

        @error('apellido')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- EMAIL -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               class="form-control @error('email') is-invalid @enderror"
               name="email"
               value="{{ old('email') }}">

        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

@endif
            <!-- TIPO DE CONSULTA (DROPDOWN) -->
            <div class="mb-3">
                <label class="form-label">Tipo de consulta</label>

                <div class="dropdown">
                    <!-- Botón que muestra la opción elegida -->
                    <button id="btnTipo" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                       {{ old('motivo') ? old('motivo') : 'Seleccionar tipo' }}
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
               <input type="hidden" name="motivo" id="tipoSeleccionado" value="{{ old('motivo') }}">
            </div>

            <!-- MENSAJE / CONSULTA -->
            <div class="mb-3">
                <label class="form-label">Consulta</label>
                <textarea class="form-control @error('consulta') is-invalid @enderror" name="consulta" rows="4">{{ old('consulta') }}</textarea>
                @error('consulta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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