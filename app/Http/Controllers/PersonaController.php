<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaRequest;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function guardar(PersonaRequest $request)
    {
        $datos = $request->validated();

        Persona::create([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'telefono' => $datos['telefono'],
            'email' => $datos['email'],
            'password' => $datos['password'],
            'id_perfil' => 2, // cliente
            'estado' => 1
        ]);

        return redirect()
            ->route('login.form')
            ->with(
                'success',
                'Registro exitoso. Ya puedes iniciar sesión.'
            );
    }
}