<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PruebaController; // <--- IMPORTANTE: Agregué esta línea

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
})->name('catalogo');
Route::get('/consultas', function () {
    return view('frontend.consultas');
});

Route::get('/registrarse', [RegistroController::class, 'registrarse'])->name('registrarse');
Route::post('/registrarse', [RegistroController::class, 'guardar'])->name('registrarse.guardar');

// 2. Esta es la ruta que filtra por categoría
Route::get('/productos/{categoria?}', [PruebaController::class, 'ver_catalogo'])->name('ver.catalogo');