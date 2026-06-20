<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     
    public function formularioRegistro()
    {
        return view('frontend.registrarse');
    }

    
    public function formularioLogin()
    {
        return view('frontend.login'); 
    }

    
    public function registrar(RegistroRequest $request)
    {
        $datos = $request->validated();

        $datos['id_perfil'] = 2; // Cliente
        $datos['estado'] = 1;    // Activo
        $datos['password'] = Hash::make($datos['password']); 

        Persona::create($datos);

        return redirect()
            ->route('login.form')
            ->with('success', 'Usuario registrado correctamente');
    }

   
public function login(LoginRequest $request)
{
    $persona = Persona::where(
        'email',
        $request->email
    )->first();

    if (
        !$persona ||
        !Hash::check(
            $request->password,
            $persona->password
        )
    ) {
        return back()->withErrors([
            'email' => 'Correo o contraseña incorrectos'
        ]);
    }

    
    if ($persona->estado == 0) {

        return back()->withErrors([
            'email' => 'Esta cuenta se encuentra desactivada.'
        ]);
    }

    session([
        'id_usuario'      => $persona->id,
        'nombre_usuario'  => $persona->nombre,
        'apellido_usuario'=> $persona->apellido,
        'email_usuario'   => $persona->email,
        'perfil_usuario'  => $persona->id_perfil
    ]);

    
    if ($persona->id_perfil == 1) {
        return redirect('/admin');
    }

    return redirect()->route('catalogo');
}
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}