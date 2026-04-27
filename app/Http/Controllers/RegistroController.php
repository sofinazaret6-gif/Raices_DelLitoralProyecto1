<?php

namespace App\Http\Controllers;
// Importa la clase Request para manejar los datos del formulario
use Illuminate\Http\Request;
// Definición del controlador de registro
class RegistroController extends Controller
{
    // Muestra la vista del formulario de registro
    public function registrarse()
    {
        return view('frontend.registrarse');
    }
     // Procesa los datos enviados desde el formulario
    public function guardar(Request $request)
    {
        // Validación de los datos ingresados por el usuario
        // 'required' = obligatorio
        // 'string' = debe ser texto
        // 'max:255' = máximo 255 caracteres
        // 'email' = formato válido
        // 'min:6' = mínimo 6 caracteres
        // 'same:password_confirmation' = debe coincidir con el campo de confirmación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|same:password_confirmation'
        ]);

        // Despues guardar en BDD

        return redirect()->route('registrarse')->with('success', 'Usuario registrado correctamente');
    }
}
