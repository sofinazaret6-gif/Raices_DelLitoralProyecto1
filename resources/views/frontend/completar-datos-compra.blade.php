<x-layout>

    <x-slot:title>
        Completar Datos
    </x-slot:title>

    <x-slot:barraP>
        <h4>COMPLETAR DATOS DE COMPRA</h4>
    </x-slot:barraP>

    <div class="container py-5">

        <div class="card shadow border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    Completar Datos Para Finalizar Compra!
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('perfil.guardarDatosCompra') }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Teléfono
                            </label>

                            <input
                                type="text"
                                name="telefono"
                                class="form-control"
                                value="{{ old('telefono', $persona->telefono) }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                DNI
                            </label>

                            <input
                                type="text"
                                name="dni"
                                class="form-control"
                                value="{{ old('dni', $persona->dni) }}"
                                required>
                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Dirección
                        </label>

                        <input
                            type="text"
                            name="direccion"
                            class="form-control"
                            value="{{ old('direccion', $persona->direccion) }}"
                            required>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Ciudad
                            </label>

                            <input
                                type="text"
                                name="ciudad"
                                class="form-control"
                                value="{{ old('ciudad', $persona->ciudad) }}"
                                required>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Provincia
                            </label>

                            <input
                                type="text"
                                name="provincia"
                                class="form-control"
                                value="{{ old('provincia', $persona->provincia) }}"
                                required>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Código Postal
                            </label>

                            <input
                                type="text"
                                name="codigo_postal"
                                class="form-control"
                                value="{{ old('codigo_postal', $persona->codigo_postal) }}"
                                required>

                        </div>

                    </div>

                    <div class="text-end">

                        <button
                            type="submit"
                            class="btn btn-success">

                            Guardar datos

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-layout>