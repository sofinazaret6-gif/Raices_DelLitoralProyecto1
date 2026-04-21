<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {
    return view('frontend.principal');
});

Route::get('/quienes-somos', function () {
    return view('frontend.quienes-somos');
});

Route::get('/comercializacion', function () {
    return view('frontend.comercializacion');
});

Route::get('/contacto', function () {
    return view('frontend.contacto');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('/terminos', function () {
    return view('frontend.terminos');
});

Route::get('/catalogo', function () {
    return view('frontend.catalogo');
});

Route::get('/consultas', function () {
    return view('frontend.consultas');
});
Route::get('/registrarse', [RegistroController::class, 'registrarse'])
    ->name('registrarse');
Route::post('/registrarse', [RegistroController::class, 'guardar'])
    ->name('registrarse.guardar');