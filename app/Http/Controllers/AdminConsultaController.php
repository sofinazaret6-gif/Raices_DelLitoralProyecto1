<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta

class AdminConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::all();

        return view(
            'dashboard.listar_consultas',
            compact('consultas')
        );
    }
    public function responder($id)
{
    $consulta = Consulta::findOrFail($id);

    // cambiar estado
    $consulta->estado_consulta = 'respondida';
    $consulta->save();

    // abrir gmail/mail
    return redirect()->away(
        'mailto:' . $consulta->email .
        '?subject=Respuesta a su consulta'
    );
}
}