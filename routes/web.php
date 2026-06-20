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

// Ruta principal
Route::get('/', [ProductoController::class, 'ver_principal'])->name('principal');

// Vistas estáticas
Route::get('/quienes-somos', function () { return view('frontend.quienes-somos'); });
Route::get('/comercializacion', function () { return view('frontend.comercializacion'); });
Route::get('/contacto', function () { return view('frontend.contacto'); });
Route::post('/contacto', [ContactoController::class, 'procesar']);
Route::get('/terminos', function () { return view('frontend.terminos'); });
Route::get('/consultas', function () { return view('frontend.consultas'); });

// ----------------------------------------------------
// RUTAS DE CATÁLOGO
// ----------------------------------------------------
Route::get('/catalogo', [ProductoController::class, 'mostrarCategorias'])->name('catalogo');
Route::get('/productos', [ProductoController::class, 'ver_catalogo'])->name('ver.catalogo');
Route::get('/productos/{id_categoria}', [ProductoController::class, 'ver_catalogo'])->where('id_categoria', '[0-9]+');

// ----------------------------------------------------
// RUTAS DE AUTENTICACIÓN
// ----------------------------------------------------
Route::get('/registrarse', [AuthController::class, 'formularioRegistro'])->name('registrarse');
Route::post('/registrarse', [AuthController::class, 'registrar'])->name('registrarse.guardar');
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------------------------------
// PANEL DE ADMINISTRACIÓN
// ----------------------------------------------------
Route::middleware(['role:1'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/consultas', [AdminController::class, 'consultas']);
    Route::post('/admin/consultas/{id}/responder', [AdminConsultaController::class, 'responder'])->name('consultas.responder');
    Route::patch('admin/productos/{id}/toggle-estado', [ProductoController::class, 'toggleEstado'])->name('productos.toggleEstado');
    Route::patch('admin/productos/{id}/stock', [ProductoController::class, 'updateStock'])->name('productos.updateStock');
    Route::get('admin/gestion-stock', [ProductoController::class, 'gestionStock'])->name('productos.gestionStock');
    Route::patch('/admin/productos/ocultar-todo', [ProductoController::class, 'ocultarTodo'])->name('productos.ocultarTodo');
    Route::patch('/admin/productos/mostrar-todo', [ProductoController::class, 'mostrarTodo'])->name('productos.mostrarTodo');
    Route::get('/admin/ventas', [AdminController::class, 'listarVentas'])->name('admin.ventas');
    Route::resource('admin/productos', ProductoController::class)->names('productos');
});

// ----------------------------------------------------
// PERFIL Y CONFIGURACIÓN
// ----------------------------------------------------
Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil');
Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
Route::delete('/perfil', [PerfilController::class, 'destroy'])->name('perfil.destroy');
Route::get('/perfil/password', [PerfilController::class, 'editPassword'])->name('perfil.password');
Route::put('/perfil/password', [PerfilController::class, 'updatePassword'])->name('perfil.password.update');

// ----------------------------------------------------
//  CARRITO DE COMPRAS
// ----------------------------------------------------
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
Route::post('/carrito/agregar/{idProducto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::put('/carrito/actualizar/{idProducto}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::delete('/carrito/eliminar/{idProducto}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

//  FINALIZAR: verifica datos personales
Route::post('/carrito/finalizar', [CarritoController::class, 'finalizar'])->name('carrito.finalizar');

//  DATOS COMPRA
Route::get('/completar-datos-compra', [PersonaController::class, 'formCompletarDatos'])->name('perfil.completar');
Route::put('/completar-datos-compra', [PersonaController::class, 'guardarDatosCompra'])->name('perfil.guardarDatosCompra');

//  PAGO: Eliminamos '/compra/confirmar'
Route::get('/pago', [CarritoController::class, 'formPago'])->name('pago');
Route::post('/pago', [CarritoController::class, 'procesarPago'])->name('compra.pagar');

Route::post('/carrito/cancelar-confirmacion', function () {
    session()->forget('confirmando_compra');
    return redirect()->route('carrito');
})->name('carrito.cancelar_confirmacion');

Route::get('/comprobante/{id}', [CarritoController::class, 'comprobante'])->name('comprobante');
Route::get('/mis-compras', [CarritoController::class, 'misCompras'])->name('mis-compras');
Route::get('/admin/usuarios', [App\Http\Controllers\AdminController::class, 'listarUsuarios'])->name('admin.usuarios');