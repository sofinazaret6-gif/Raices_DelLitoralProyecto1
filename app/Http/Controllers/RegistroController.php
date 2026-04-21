<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registrarse()
    {
        return view('frontend.registrarse');
    }
    public function guardar(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|same:password_confirmation'
        ]);

        // Acá después podrías guardar en BD

        return redirect()->route('registrarse')->with('success', 'Usuario registrado correctamente');
    }
}
