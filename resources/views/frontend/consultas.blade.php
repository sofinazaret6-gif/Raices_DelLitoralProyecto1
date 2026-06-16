<x-layout>
    
    <x-slot:title>Consultas</x-slot:title>

    <x-slot:barraP>
        <h4>Realizá tu consulta</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <h2>CONSULTANOS</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/contacto') }}" method="POST">
            @csrf

            @if(session()->has('id_usuario'))

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text"
                           class="form-control"
                           name="nombre"
                           value="{{ session('nombre_usuario') }}"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text"
                           class="form-control"
                           name="apellido"
                           value="{{ session('apellido_usuario') }}"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           class="form-control"
                           name="email"
                           value="{{ session('email_usuario') }}"
                           readonly>
                </div>

            @else

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

            <div class="mb-3">
                <label class="form-label d-block">Tipo de consulta</label>

                <div class="dropdown">
                    <button id="btnTipo" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       {{ old('motivo') ? old('motivo') : 'Seleccionar tipo' }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="setTipo('Consulta')">Consulta</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="setTipo('Asesoramiento')">Asesoramiento</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="setTipo('Sugerencia')">Sugerencia</a>
                        </li>
                    </ul>
                </div>

                <input type="hidden" name="motivo" id="tipoSeleccionado" value="{{ old('motivo') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Consulta</label>
                <textarea class="form-control @error('consulta') is-invalid @enderror" name="consulta" rows="4">{{ old('consulta') }}</textarea>
                @error('consulta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>

        </form>
    </div>

    <script>
        function setTipo(valor) {
            document.getElementById('tipoSeleccionado').value = valor;
            document.getElementById('btnTipo').innerText = valor;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</x-layout>