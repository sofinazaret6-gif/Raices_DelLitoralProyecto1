<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController; // <-- Reemplazamos PruebaController por este
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminConsultaController;
use App\Http\Controllers\PerfilController;

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

// ----------------------------------------------------
// RUTAS DE CATÁLOGO (Conectadas a la Base de Datos)
// ----------------------------------------------------

// Redirecciona el catálogo general al método dinámico sin categoría
Route::get('/catalogo', [ProductoController::class, 'ver_catalogo'])->name('catalogo');

// Mantiene tu ruta original /productos/{categoria?} pero apuntando al nuevo controlador
Route::get('/productos/{categoria?}', [ProductoController::class, 'ver_catalogo'])->name('ver.catalogo');

// ----------------------------------------------------

// Vista de consultas (pública)
Route::get('/consultas', function () {
    return view('frontend.consultas');
});

// ----------------------------------------------------
// RUTAS DE AUTENTICACIÓN (Unificadas en AuthController)
// ----------------------------------------------------

// Registro 
Route::get('/registrarse', [AuthController::class, 'formularioRegistro'])->name('registrarse');
Route::post('/registrarse', [AuthController::class, 'registrar'])->name('registrarse.guardar');

// Login 
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------------------------------

Route::get('/carrito', function () {
    return view('frontend.carrito');
})->name('carrito');

// ----------------------------------------------------
// PANEL DE ADMINISTRACIÓN (Protegido por tu Middleware de Rol 1)
// ----------------------------------------------------
Route::middleware(['role:1'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);
<<<<<<< HEAD
    
    Route::get('/admin/consultas', [AdminController::class, 'consultas']);
    
    Route::post('/admin/consultas/{id}/responder', [AdminConsultaController::class, 'responder'])->name('consultas.responder');

    // Novedad: Rutas para que el Admin maneje los Productos (Listar, Agregar, Eliminar)
    Route::resource('admin/productos', ProductoController::class)->names('productos');
});
=======
    Route::get(
        '/admin/consultas',
        [AdminController::class, 'consultas']
    );
    Route::post(
    '/admin/consultas/{id}/responder',
    [AdminConsultaController::class, 'responder']
    )->name('consultas.responder');
});
// PERFIL
Route::get(
    '/perfil',
    [PerfilController::class, 'edit']
)->name('perfil');

Route::put(
    '/perfil',
    [PerfilController::class, 'update']
)->name('perfil.update');

Route::delete(
    '/perfil',
    [PerfilController::class, 'destroy']
)->name('perfil.destroy');

// CONTRASEÑA
Route::get(
    '/perfil/password',
    [PerfilController::class, 'editPassword']
)->name('perfil.password');

Route::put(
    '/perfil/password',
    [PerfilController::class, 'updatePassword']
)->name('perfil.password.update');
>>>>>>> 8c07e271e246afa4a2071d7f58b26ca5104536bd
