<?php

namespace App\Http\Controllers;

//  Importamos  Request personalizado
use App\Models\Persona;
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    // Mostrar formulario
    public function registrarse()
    {
        return view('frontend.registrarse');
    }

    // Guardar usuario
    public function guardar(RegistroRequest $request)
    {
        $datos = $request->validated();

        $datos['id_perfil'] = 2; // Cliente
        $datos['estado'] = 1; // Activo

        Persona::create($datos);

        return redirect()
            ->route('login.form')
            ->with(
                'success',
                'Usuario registrado correctamente'
            );
    }
}