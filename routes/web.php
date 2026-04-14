<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('backend.principal');
});

Route::get('/quienes-somos', function () {
    return view('backend.quienes-somos');
});

Route::get('/comercializacion', function () {
    return view('backend.comercializacion');
});

Route::get('/contacto', function () {
    return view('backend.contacto');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('/terminos', function () {
    return view('backend.terminos');
});

Route::get('/catalogo', function () {
    return view('backend.catalogo');
});

Route::get('/consultas', function () {
    return view('backend.consultas');
});