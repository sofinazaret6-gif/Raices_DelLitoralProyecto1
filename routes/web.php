<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminConsultaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PersonaController;

// Ruta principal (home)
Route::get('/', function () {
    return view('frontend.principal');
})->name('principal');;

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

// Redirecciona al menú principal de categorías (con el buscador y carrusel)
Route::get('/catalogo', [ProductoController::class, 'mostrarCategorias'])->name('catalogo');

// 🔍 SOLUCIÓN: Ruta limpia para ver TODOS los productos o usar el buscador principal
Route::get('/productos', [ProductoController::class, 'ver_catalogo'])->name('ver.catalogo');

// 🌿 SOLUCIÓN: Ruta exclusiva para filtrar categorías por su ID numérico (Evita conflictos)
Route::get('/productos/{id_categoria}', [ProductoController::class, 'ver_catalogo'])->where('id_categoria', '[0-9]+');

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

Route::patch('/admin/productos/ocultar-todo', [ProductoController::class, 'ocultarTodo'])
    ->name('productos.ocultarTodo');

// ----------------------------------------------------

Route::get('/carrito', function () {
    return view('frontend.carrito');
})->name('carrito');

// ----------------------------------------------------
// PANEL DE ADMINISTRACIÓN (Protegido por tu Middleware de Rol 1)
// ----------------------------------------------------
Route::middleware(['role:1'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);
    
    Route::get('/admin/consultas', [AdminController::class, 'consultas']);
    
    Route::post('/admin/consultas/{id}/responder', [AdminConsultaController::class, 'responder'])->name('consultas.responder');

    // 👁️ RUTA PARA EL OJO: Cambiar visibilidad/estado del producto
    Route::patch('admin/productos/{id}/toggle-estado', [ProductoController::class, 'toggleEstado'])->name('productos.toggleEstado');

    // 🔄 RUTA PARA EL MODAL: Modificar solo la cantidad de stock
    Route::patch('admin/productos/{id}/stock', [ProductoController::class, 'updateStock'])->name('productos.updateStock');
    
    // Ruta para entrar a ver la tabla de stock y visibilidad
    Route::get('admin/gestion-stock', [ProductoController::class, 'gestionStock'])->name('productos.gestionStock');
    
    // Rutas estándar para que el Admin maneje los Productos
    Route::resource('admin/productos', ProductoController::class)->names('productos');
});

// ----------------------------------------------------
// RUTAS DE PERFIL Y CONFIGURACIÓN (Cambios de Sofi)
// ----------------------------------------------------

// PERFIL
Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil');
Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
Route::delete('/perfil', [PerfilController::class, 'destroy'])->name('perfil.destroy');

// CONTRASEÑA
Route::get('/perfil/password', [PerfilController::class, 'editPassword'])->name('perfil.password');
Route::put('/perfil/password', [PerfilController::class, 'updatePassword'])->name('perfil.password.update');

Route::get('/carrito', [CarritoController::class, 'index'])
    ->name('carrito');

Route::post('/carrito/agregar/{idProducto}',
    [CarritoController::class, 'agregar'])
    ->name('carrito.agregar');

Route::put('/carrito/actualizar/{idProducto}',
    [CarritoController::class, 'actualizar'])
    ->name('carrito.actualizar');

Route::delete('/carrito/eliminar/{idProducto}',
    [CarritoController::class, 'eliminar'])
    ->name('carrito.eliminar');

Route::delete('/carrito/vaciar',
    [CarritoController::class, 'vaciar'])
    ->name('carrito.vaciar');

Route::post('/carrito/finalizar',
    [CarritoController::class, 'finalizar'])
    ->name('carrito.finalizar');
Route::get(
    '/completar-datos-compra',
    [PersonaController::class, 'formCompletarDatos']
)->name('perfil.completar');

Route::put(
    '/completar-datos-compra',
    [PersonaController::class, 'guardarDatosCompra']
)->name('perfil.guardarDatosCompra');
Route::post('/compra/confirmar',
    [CarritoController::class, 'confirmarCompra']
)->name('compra.confirmar');

Route::get('/pago',
    [CarritoController::class, 'formPago']
)->name('pago');

Route::post('/pago',
    [CarritoController::class, 'procesarPago']
)->name('compra.pagar');

Route::post('/carrito/cancelar-confirmacion', function () {
    session()->forget('confirmando_compra');
    return redirect()->route('carrito');
})->name('carrito.cancelar_confirmacion');

Route::get(
    '/comprobante/{id}',
    [CarritoController::class, 'comprobante']
)->name('comprobante');