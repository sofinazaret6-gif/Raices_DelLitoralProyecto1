<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PruebaController; 
use App\Http\Controllers\AuthController; // <-- 1. Único controlador importado para Auth

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

// Formulario de contacto
Route::get('/contacto', function () {
    return view('frontend.contacto');
});
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

// ----------------------------------------------------
// RUTAS DE AUTENTICACIÓN (Unificadas en AuthController)
// ----------------------------------------------------

// Registro (Mantiene tus mismos nombres de ruta)
Route::get('/registrarse', [AuthController::class, 'formularioRegistro'])->name('registrarse');
Route::post('/registrarse', [AuthController::class, 'registrar'])->name('registrarse.guardar');

// Login (Mantiene tus mismos nombres de ruta)
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout (La nueva ruta que pidió el profe usando POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------------------------------

// Ruta dinámica para ver productos por categoría
Route::get('/productos/{categoria?}', [PruebaController::class, 'ver_catalogo'])->name('ver.catalogo');

Route::get('/carrito', function () {
    return view('frontend.carrito');
})->name('carrito');