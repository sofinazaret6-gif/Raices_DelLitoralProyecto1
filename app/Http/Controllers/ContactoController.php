<?php

namespace App\Http\Controllers;
//importamos el request con sus mensajes y validaciones
use App\Http\Requests\ContactoRequest; 
use Illuminate\Http\Request;


class ContactoController extends Controller
{
    /**
     * Método que procesa los datos enviados desde el formulario.
     * " por tu clase "ContactoRequest".
     */
    public function procesar(ContactoRequest $request)
    {
        // ¡Ya no hace falta la validación manual  pq lo hace el request
        // Retorna una vista  'frontend.exito'
        // y le pasa los datos ingresados por el usuario
        return view('frontend.exito', [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'mensaje' => $request->consulta
        ]);
    }
}