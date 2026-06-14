<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Calcular Ventas Totales del Mes
        $ventasMes = \App\Models\Venta::where('estadoVenta', 'realizada')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('total');

        // 2. Contar Productos con bajo stock 
        $bajoStock = \App\Models\Producto::where('stock', '<', 5)->count();

        // 3. Contar Consultas Pendientes 
        $consultasPendientes = \App\Models\Consulta::where('estado_consulta', 'pendiente')->count();

        // 4. Calcular Ventas del Día de hoy
        $ventasDia = \App\Models\Venta::where('estadoVenta', 'realizada')
            ->whereDate('created_at', date('Y-m-d'))
            ->sum('total');

        // 5. Traer las Últimas 5 Ventas realizadas 
        $ultimasVentas = \App\Models\Venta::with('cliente')
            ->orderBy('created_at', 'desc')
            ->limit(5)
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
        $ventas = \App\Models\Venta::with(['cliente', 'detalles.producto'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.listar-ventas', compact('ventas'));
    }
}