<x-layout>
    <x-slot:title>Iniciar sesión</x-slot:title>

    <x-slot:barraP>
        <h4>Inicio de Sesión</h4>
    </x-slot:barraP>

    <div class="container d-flex justify-content-center align-items-center my-5">

        <div class="card shadow-lg border-0 rounded-4 p-4" style="width:30rem;">

            <div class="text-center mb-4">
                <h2>🌿 Bienvenido</h2>
                <p class="text-muted">
                    Inicia sesión en Raíces del Litoral
                </p>
            </div>

            <form action="{{ route('login') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        class="form-control rounded-3 @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="ejemplo@correo.com"
                    >

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="password" class="form-label">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        class="form-control rounded-3 @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder="Ingresa tu contraseña"
                    >

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-grid">
                    <button type="submit"
                            class="btn btn-success rounded-3">
                        Ingresar 🌱
                    </button>
                </div>

                <div class="text-center mt-3">
                    <small>
                        ¿No tienes cuenta?
                        <a href="{{ route('registrarse') }}">
                            Regístrate
                        </a>
                    </small>
                </div>

            </form>

        </div>

    </div>

    </x-layout>