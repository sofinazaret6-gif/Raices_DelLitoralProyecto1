<?php

namespace App\Http\Controllers

use App\Http\Requests\ContactoRequest;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function procesar(ContactoRequest $request)
    {
        // Variables para guardar datos
        $nombre = '';
        $apellido = '';
        $email = '';

        // Si el usuario inició sesión
       if (session()->has('id_usuario')) {

            $nombre = session('nombre_usuario');
            $apellido = session('apellido_usuario');
            $email = session('email_usuario');
        } else {

            // Usuario sin login
            $nombre = $request->nombre;
            $apellido = $request->apellido;
            $email = $request->email;
        }

        // Guardar consulta
        Consulta::create([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'motivo' => $request->motivo,
            'consulta' => $request->consulta,
        ]);

        // Página éxito
        return view('frontend.exito', [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'mensaje' => $request->consulta
        ]);
    }
}