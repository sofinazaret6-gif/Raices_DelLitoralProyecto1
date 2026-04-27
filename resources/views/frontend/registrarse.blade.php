<x-layout>
    <x-slot:title>Registrarse</x-slot:title>

    <x-slot:barraP>
        <h4>Registro</h4>
    </x-slot:barraP>

    <section class="py-5" style="min-height: 100vh; background: transparent;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    
                    
                    <div class="card shadow-lg" style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.95); border: none;">
                        <div class="card-body p-5">
                             <!-- @if: verifica si hay mensaje de éxito en sesión -->
                            @if(session('success'))
                             <!-- Se muestra si el registro fue exitoso -->
                                <div class="text-center py-5">
                                    <h2 class="text-uppercase mb-3" style="color: #4b6b40;">¡Registro Exitoso!</h2>
                                    <!-- Muestra el mensaje guardado en sesión -->
                                    <p class="lead mb-4">{{ session('success') }}</p>
                                    <!-- Botón para recargar -->
                                    <a href="{{ route('registrarse') }}" class="btn btn-success btn-lg">Aceptar</a>
                                </div>
                            @else
                             <!-- Si NO hay éxito, muestra el formulario -->
                                <h2 class="text-uppercase text-center mb-5">CREAR CUENTA</h2>
                                <!-- @if: verifica si hay errores -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                 <!-- Formulario -->
                                <form method="POST" action="{{ route('registrarse.guardar') }}">
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold">Nombre Completo</label>
                                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control form-control-lg border-success-subtle" placeholder="Tu nombre..." />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold">Correo Electrónico</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg border-success-subtle" placeholder="ejemplo@correo.com" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold">Contraseña</label>
                                        <input type="password" name="password" class="form-control form-control-lg border-success-subtle" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold">Repetir Contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg border-success-subtle" />
                                    </div>
                                     <!-- Botón -->
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg text-white px-5" style="background-color: #4b6b40; border: none;">
                                            Registrarse
                                        </button>
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