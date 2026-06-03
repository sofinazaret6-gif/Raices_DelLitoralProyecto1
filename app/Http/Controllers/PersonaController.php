<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
    public function formCompletarDatos()
{
    $persona = Persona::findOrFail(
        session('id_usuario')
    );

    return view(
        'frontend.completar-datos-compra',
        compact('persona')
    );
}
public function guardarDatosCompra(Request $request)
{
    $request->validate([
        'telefono' => 'required',
        'dni' => 'required',
        'direccion' => 'required',
        'ciudad' => 'required',
        'provincia' => 'required',
        'codigo_postal' => 'required',
    ]);

    $persona = Persona::findOrFail(
        session('id_usuario')
    );

    $persona->update([
        'telefono' => $request->telefono,
        'dni' => $request->dni,
        'direccion' => $request->direccion,
        'ciudad' => $request->ciudad,
        'provincia' => $request->provincia,
        'codigo_postal' => $request->codigo_postal,
    ]);

    return redirect()
    ->route('carrito.finalizar.get');
        ->with(
            'success',
            'Datos actualizados correctamente.'
        );
}
}