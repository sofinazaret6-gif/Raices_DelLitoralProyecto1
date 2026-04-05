@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('BarraP')
<h2 class="m-0 py-2 text-center">Sobre nosotros</h2>
@endsection

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center min-vh-50 py-5">
    <div class="col-md-8 text-center shadow-lg p-5 rounded-4 bg-white bg-opacity-75">
        
        <h1 class="display-4 fw-bold mb-4" style="color: #27ae60;">Raíces del Litoral</h1>
        
        <p class="lead fs-4 mb-4">
            Desde el corazón de <strong>Corrientes</strong>, cultivamos vida y compartimos la esencia de nuestra tierra con vos.
        </p>
        
        <div class="row g-4 text-start">
            <div class="col-md-6">
                <ul class="list-unstyled fs-5">
                    <li>🌿 <strong>Plantas Frutales:</strong> Cítricos y nativas listas para dar fruto.</li>
                    <li>🌸 <strong>Aromas únicos:</strong> Variedad de plantas aromáticas para tu jardín.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-unstyled fs-5">
                    <li>🌱 <strong>Insumos:</strong> La mejor tierra fértil y abonos orgánicos.</li>
                    <li>🏡 <strong>Asesoramiento:</strong> Te ayudamos a que tu rincón verde prospere.</li>
                </ul>
            </div>
        </div>

        <hr class="my-4" style="border-color: #27ae60;">

        <p class="fs-5 italic mb-4">
            "No solo vendemos plantas, entregamos un pedacito de la naturaleza correntina en cada maceta."
        </p>

        <div class="mt-4">
            <a href="{{ url('/comercializacion') }}" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow-sm" style="background-color: #27ae60; border: none;">
                Ver Productos
            </a>
        </div>

    </div>
</div>
@endsection