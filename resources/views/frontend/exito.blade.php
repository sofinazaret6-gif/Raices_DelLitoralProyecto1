<x-layout>

    <x-slot:title>Éxito</x-slot:title>

    <x-slot:barraP>
        <h4>Consulta Enviada</h4>
    </x-slot:barraP>

    <div class="container mt-5">
        <div class="alert alert-success text-center">

            <p class="lead">
                Hola <strong>{{ $nombre }}</strong> <strong>{{ $apellido }}</strong>, 
                ¡qué bueno recibir tu mensaje!
            </p>

            <p>
                Un miembro del equipo de asesoría se pondrá en contacto con vos al correo:
                <strong>{{ $email }}</strong>
            </p>

            <p>
                Tu consulta fue:
                <br>
                <em>"{{ $mensaje }}"</em>
            </p>

            <p><strong>¡Muchas gracias!</strong></p>

        </div>
    </div>

</x-layout>