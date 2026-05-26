<x-layout>
    <x-slot:title>Registrarse</x-slot:title>

    <x-slot:barraP>
        <h4>Registro</h4>
    </x-slot:barraP>

    <section class="py-5" style="min-height: 100vh; background: transparent;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-12 col-md-9 col-lg-7 col-xl-6">

                    <div class="card shadow-lg"
                         style="border-radius: 20px; background-color: rgba(255,255,255,.95); border:none;">

                        <div class="card-body p-5">

                            @if(session('success'))

                                <div class="text-center py-5">
                                    <h2 class="text-uppercase mb-3"
                                        style="color:#4b6b40;">
                                        🌱 ¡Registro exitoso!
                                    </h2>

                                    <p class="lead mb-4">
                                        {{ session('success') }}
                                    </p>

                                    <a href="{{ route('login.form') }}"
                                       class="btn btn-success btn-lg">
                                        Ir a iniciar sesión
                                    </a>
                                </div>

                            @else

                                <h2 class="text-uppercase text-center mb-2"
                                    style="color:#4b6b40;">
                                    Crear Cuenta
                                </h2>

                                <p class="text-center text-muted mb-5">
                                    Únete a Raíces del Litoral 🌿
                                </p>

                                {{-- Errores --}}
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">

                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endif


                                <form method="POST"
                                      action="{{ route('registrarse.guardar') }}"novalidate>

                                    @csrf

                                    <div class="row">

                                        {{-- Nombre --}}
                                        <div class="col-md-6 mb-4">

                                            <label class="form-label fw-bold">
                                                Nombre
                                            </label>

                                            <input
                                                type="text"
                                                name="nombre"
                                                value="{{ old('nombre') }}"
                                                class="form-control form-control-lg border-success-subtle"
                                                placeholder="Tu nombre"
                                            >

                                        </div>


                                        {{-- Apellido --}}
                                        <div class="col-md-6 mb-4">

                                            <label class="form-label fw-bold">
                                                Apellido
                                            </label>

                                            <input
                                                type="text"
                                                name="apellido"
                                                value="{{ old('apellido') }}"
                                                class="form-control form-control-lg border-success-subtle"
                                                placeholder="Tu apellido"
                                            >

                                        </div>

                                    </div>


                                    {{-- Email --}}
                                    <div class="mb-4">

                                        <label class="form-label fw-bold">
                                            Correo Electrónico
                                        </label>

                                        <input
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            class="form-control form-control-lg border-success-subtle"
                                            placeholder="ejemplo@correo.com"
                                        >

                                    </div>


                                    {{-- Contraseña --}}
                                    <div class="mb-4">

                                        <label class="form-label fw-bold">
                                            Contraseña
                                        </label>

                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control form-control-lg border-success-subtle"
                                            placeholder="Mínimo 6 caracteres"
                                        >

                                    </div>


                                    {{-- Confirmar contraseña --}}
                                    <div class="mb-4">

                                        <label class="form-label fw-bold">
                                            Repetir contraseña
                                        </label>

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            class="form-control form-control-lg border-success-subtle"
                                            placeholder="Repite tu contraseña"
                                        >

                                    </div>


                                    <div class="d-grid">

                                        <button
                                            type="submit"
                                            class="btn btn-lg text-white"
                                            style="background-color:#4b6b40; border:none;">

                                            Registrarse 🌱

                                        </button>

                                    </div>

                                    <div class="text-center mt-4">

                                        <small class="text-muted">

                                            ¿Ya tienes una cuenta?

                                            <a href="{{ route('login.form') }}"
                                               class="text-decoration-none">

                                                Iniciar sesión

                                            </a>

                                        </small>

                                    </div>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

</x-layout>