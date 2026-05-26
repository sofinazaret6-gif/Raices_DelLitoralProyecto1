<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $persona = Persona::where(
            'email',
            $request->email
        )->first();

        if(!$persona || !Hash::check(
            $request->password,
            $persona->password
        ))
        {
            return back()->withErrors([
                'email' => 'Correo o contraseña incorrectos'
            ]);
        }

        session([
            'id_usuario' => $persona->id,
            'nombre_usuario' => $persona->nombre,
            'perfil_usuario' => $persona->id_perfil
        ]);

        return redirect()->route('catalogo');
    }
}
