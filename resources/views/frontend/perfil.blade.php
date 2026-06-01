<x-layout>

    <x-slot:title>
        Perfil
    </x-slot:title>

    <x-slot:barraP>
        <h4>Editar Perfil</h4>
    </x-slot:barraP>

    <div class="container my-5">

        <div class="card shadow-sm p-4">

            <h3 class="mb-4">
                Mis datos
            </h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

           <form action="{{ route('perfil.update') }}"
                method="POST"
                           novalidate>

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="{{ old('nombre', $persona->nombre) }}">

                    @error('nombre')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Apellido
                    </label>

                    <input type="text"
                           name="apellido"
                           class="form-control"
                           value="{{ old('apellido', $persona->apellido) }}">

                    @error('apellido')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Correo electrónico
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $persona->email) }}">

                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Teléfono (opcional)
                    </label>

                    <input type="text"
                           name="telefono"
                           class="form-control"
                           value="{{ old('telefono', $persona->telefono) }}"
                           placeholder="Ingresá tu teléfono">

                    @error('telefono')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Actualizar datos
                </button>

            </form>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <a href="{{ route('perfil.password') }}"
                         class="btn btn-warning">
                             Cambiar contraseña
                        </a>
                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf
                     
                    <button type="submit"
                            class="btn btn-secondary">
                        Cerrar sesión
                    </button>
                </form>
                <form action="{{ route('perfil.destroy') }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                   <button type="submit"
                         class="btn btn-danger"
                           onclick="return confirm(
                                '¿Seguro que deseas eliminar tu cuenta? Esta acción no se puede deshacer.'
                                )">
                                 Eliminar cuenta
                            </button>
                </form>

            </div>

        </div>

    </div>

</x-layout>