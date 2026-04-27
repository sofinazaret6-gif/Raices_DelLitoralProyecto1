<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PruebaController; // Controlador para manejar el catálogo y filtros
// Ruta principal (home)
Route::get('/', function () {
    return view('frontend.principal');
});
// Vista "Quiénes somos"
Route::get('/quienes-somos', function () {
    return view('frontend.quienes-somos');
});
// Vista de comercialización
Route::get('/comercializacion', function () {
    return view('frontend.comercializacion');
});
// Formulario de contacto (GET muestra la vista)
Route::get('/contacto', function () {
    return view('frontend.contacto');
});
// Procesamiento del formulario de contacto (POST envía datos al controlador)
Route::post('/contacto', [ContactoController::class, 'procesar']);
// Vista de términos y condiciones
Route::get('/terminos', function () {
    return view('frontend.terminos');
});
// Vista del catálogo general
Route::get('/catalogo', function () {
    return view('frontend.catalogo');
})->name('catalogo');
// Vista de consultas
Route::get('/consultas', function () {
    return view('frontend.consultas');
});
// Mostrar formulario de registro
Route::get('/registrarse', [RegistroController::class, 'registrarse'])->name('registrarse');
// Guardar datos del registro (POST)
Route::post('/registrarse', [RegistroController::class, 'guardar'])->name('registrarse.guardar');

// Ruta dinámica para ver productos por categoría (opcional)
// Ej: /productos o /productos/plantas de interior
Route::get('/productos/{categoria?}', [PruebaController::class, 'ver_catalogo'])->name('ver.catalogo');

Route::get('/carrito', function () {
    return view('frontend.carrito');
})->name('carrito');