<x-layout>
   
    <x-slot:title>Consultas</x-slot:title>

    <x-slot:barraP>
        <h4>realiza tu consulta</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <h2>CONSULTANOS</h2>

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

            <div class="mb-3">
                <label class="form-label">Consulta</label>
                <textarea class="form-control" name="consulta" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Enviar
            </button>

        </form>
    </div>

</x-layout>