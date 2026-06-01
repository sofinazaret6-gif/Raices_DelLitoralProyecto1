<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
use App\Http\Requests\CambiarPasswordRequest;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function edit()
    {
        $persona = Persona::find(
            session('id_usuario')
        );

        // ADMIN
        if (
            session('perfil_usuario') == 1
        ) {
            return view(
                'dashboard.perfiladmin',
                compact('persona')
            );
        }

        // CLIENTE
        return view(
            'frontend.perfil',
            compact('persona')
        );
    }

    public function update(
        PerfilRequest $request
    )
    {
        $persona = Persona::find(
            session('id_usuario')
        );

        $persona->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'email' => $request->email
        ]);

        // actualizar datos sesión
        session([
            'nombre_usuario' =>
                $persona->nombre,

            'apellido_usuario' =>
                $persona->apellido,

            'email_usuario' =>
                $persona->email
        ]);

        return back()->with(
            'success',
            'Datos actualizados correctamente'
        );
    }

    public function destroy()
    {
        // impedir borrar admin
        if (
            session('perfil_usuario') == 1
        ) {
            return back()->with(
                'error',
                'El administrador no puede eliminar su cuenta.'
            );
        }

        $persona = Persona::find(
            session('id_usuario')
        );

        // cerrar sesión
        session()->flush();

        // eliminar cuenta
        $persona->delete();

        return redirect('/');
    }

    public function editPassword()
    {
        // ADMIN
        if (
            session('perfil_usuario') == 1
        ) {
            return view(
                'dashboard.cambiar_passwordadmin'
            );
        }

        // CLIENTE
        return view(
            'frontend.cambiar-password'
        );
    }

    public function updatePassword(
        CambiarPasswordRequest $request
    )
    {
        $persona = Persona::find(
            session('id_usuario')
        );

        // verificar contraseña actual
        if (!Hash::check(
            $request->password_actual,
            $persona->password
        )) {
            return back()->withErrors([
                'password_actual' =>
                'La contraseña actual es incorrecta.'
            ]);
        }

        // actualizar contraseña
        $persona->update([
            'password' => Hash::make(
                $request->password
            )
        ]);

        return back()->with(
            'success',
            'Contraseña actualizada correctamente.'
        );
    }
}