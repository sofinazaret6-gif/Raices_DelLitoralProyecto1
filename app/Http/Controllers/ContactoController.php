<?php
// Namespace donde está ubicado el controlador dentro del proyecto Laravel
namespace App\Http\Controllers;
// Se importa la clase Request para manejar los datos del formulario
use Illuminate\Http\Request;
// Definición del controlador
class ContactoController extends Controller
{
     // Método que procesa los datos enviados desde el formulario
    public function procesar(Request $request)
    {
        // Validación de los datos recibidos
        // 'required' = campo obligatorio
        // 'email' = formato válido de correo electrónico
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'consulta' => 'required'
        ]);
        // Retorna una vista llamada 'frontend.exito'
        // y le pasa los datos ingresados por el usuario
        return view('frontend.exito', [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'mensaje' => $request->consulta
        ]);
    }
}