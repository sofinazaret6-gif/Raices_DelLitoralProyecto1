<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\Persona
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Muestra el formulario de registro (De tu RegistroController)
    public function formularioRegistro()
    {
        return view('frontend.registrarse');
    }

    // 2. Muestra el formulario de login (Ajustá el nombre de la vista si es otro)
    public function formularioLogin()
    {
        return view('frontend.login'); 
    }

    // 3. Procesa el formulario de registro y guarda (De tu RegistroController)
    public function registrar(RegistroRequest $request)
    {
        $datos = $request->validated();

        $datos['id_perfil'] = 2; // Cliente
        $datos['estado'] = 1;    // Activo
        // Tip Pro: Encriptamos la clave para que no se guarde en texto plano
        $datos['password'] = Hash::make($datos['password']); 

        Persona::create($datos);

        return redirect()
            ->route('login.form')
            ->with('success', 'Usuario registrado correctamente');
    }

    // 4. Procesa el formulario de login
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

    session([
        'id_usuario'     => $persona->id,
        'nombre_usuario' => $persona->nombre,
         'apellido_usuario'=> $persona->apellido,
         'email_usuario'   => $persona->email,
        'perfil_usuario' => $persona->id_perfil
    ]);

    // Redirección según perfil
    if ($persona->id_perfil == 1) {
        return redirect('/admin');
    }

    return redirect()->route('catalogo');
}
    // 5. Procesa el logout (El código que dio el profe)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}