<x-layout>

    <x-slot:title>
        Cambiar Contraseña
    </x-slot:title>

    <x-slot:barraP>
        <h4>Cambiar contraseña</h4>
    </x-slot:barraP>

    <div class="container my-5">

        <div class="card p-4 shadow-sm">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('perfil.password.update') }}"
                  method="POST"
                  novalidate>

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>
                        Contraseña actual
                    </label>

                    <input type="password"
                           name="password_actual"
                           class="form-control">

                    @error('password_actual')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>
                        Nueva contraseña
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label>
                        Confirmar contraseña
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control">
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Cambiar contraseña
                </button>

            </form>

        </div>

    </div>

</x-layout>