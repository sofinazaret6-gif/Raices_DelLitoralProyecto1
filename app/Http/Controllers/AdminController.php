<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Venta;
use App\Models\Producto;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Fijamos la zona horaria de Argentina
        $hoy = Carbon::now('America/Argentina/Buenos_Aires');
        $fechaHoyString = $hoy->format('Y-m-d');

        // 1. Calcular Ventas Totales del Mes (usando horario de Argentina)
        $ventasMes = Venta::where('estadoVenta', 'realizada')
            ->whereMonth('created_at', $hoy->month)
            ->whereYear('created_at', $hoy->year)
            ->sum('total');

        // 2. Contar Productos con bajo stock 
        $bajoStock = Producto::where('stock', '<', 5)->count();

        // 3. Contar Consultas Pendientes 
        $consultasPendientes = Consulta::where('estado_consulta', 'pendiente')->count();

        // 4. Calcular Ventas del Día de hoy (Convertimos el created_at de la BD a la fecha de Argentina antes de comparar)
        $ventasDia = Venta::where('estadoVenta', 'realizada')
            ->whereRaw("DATE(CONVERT_TZ(created_at, '+00:00', '-03:00')) = ?", [$fechaHoyString])
            ->sum('total');

        // 5. Traer las Últimas 5 Ventas realizadas (Ajustadas a lo que realmente pertenece al día de hoy)
        $ultimasVentas = Venta::with('cliente')
            ->whereRaw("DATE(CONVERT_TZ(created_at, '+00:00', '-03:00')) = ?", [$fechaHoyString])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.principalAdmin', compact(
            'ventasMes', 
            'bajoStock', 
            'consultasPendientes', 
            'ventasDia', 
            'ultimasVentas'
        ));
    }

    public function consultas()
    {
        $consultas = Consulta::all();
        return view('dashboard.listar_consultas', compact('consultas'));
    }

    public function responder($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->estado_consulta = 'respondida';
        $consulta->save();

        return redirect()->away('mailto:' . $consulta->email . '?subject=Respuesta a su consulta');
    }

    public function listarVentas()
    {
        $ventas = Venta::with(['cliente', 'detalles.producto'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.listar-ventas', compact('ventas'));
    }
    public function listarUsuarios()
    {
        // Traemos todas las personas con su respectivo perfil/rol
        $usuarios = \App\Models\Persona::with('perfil')->orderBy('created_at', 'desc')->get();
        
        return view('dashboard.listar_usuarios', compact('usuarios'));
    }
}