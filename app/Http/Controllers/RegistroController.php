<?php

namespace App\Http\Controllers;

//  Importamos  Request personalizado
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    // Muestra la vista del formulario de registro
    public function registrarse()
    {
        return view('frontend.registrarse');
    }

    // Procesa los datos enviados desde el request
    public function guardar(RegistroRequest $request)
    {
        dd(get_class($request));
        // Aca la lógica para guardar el usuario en la base de datos.
        return redirect()->route('registrarse')->with('success', 'Usuario registrado correctamente');
    }
}