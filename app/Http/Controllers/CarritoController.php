<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar($idProducto)
{
    $producto = Producto::findOrFail($idProducto);

    // Verificar si hay stock
    if ($producto->stock <= 0) {

        return back()->with(
            'error',
            'Este producto no tiene stock disponible.'
        );
    }

    $carrito = session()->get('carrito', []);

    // Verificar si ya está en el carrito
    if (isset($carrito[$idProducto])) {

        return back()->with(
            'error',
            'El producto ya está en el carrito. Modifica la cantidad desde el carrito.'
        );
    }

    // Agregar producto
    $carrito[$idProducto] = [
        'nombre'   => $producto->nombre,
        'precio'   => $producto->precio,
        'cantidad' => 1,
        'stock'    => $producto->stock,
        'imagen'   => $producto->imagen,
    ];

    session(['carrito' => $carrito]);

    return back()->with(
        'success',
        'Producto agregado al carrito.'
    );
}

 public function index()
{
    $carrito = session()->get('carrito', []);

    $persona = null;

    if (session()->has('id_usuario')) {

        $persona = Persona::find(
            session('id_usuario')
        );
    }

    $mostrarModal = session(
        'confirmando_compra',
        false
    );

    return view(
        'frontend.carrito',
        compact(
            'carrito',
            'persona',
            'mostrarModal'
        )
    );
}

    public function actualizar(Request $request, $idProducto)
{
    $request->validate([
        'cantidad' => 'required|integer|min:1'
    ]);

    $producto = Producto::findOrFail($idProducto);

    if ($request->cantidad > $producto->stock) {

        return redirect()
            ->route('carrito')
            ->with('error',
                'No hay suficiente stock disponible.'
            );
    }

    $carrito = session()->get('carrito', []);

    if (isset($carrito[$idProducto])) {

        $carrito[$idProducto]['cantidad']
            = $request->cantidad;

        session()->put('carrito', $carrito);
    }

    return redirect()
        ->route('carrito')
        ->with('success',
            'Cantidad actualizada correctamente.');
}
  public function eliminar($idProducto)
{
    $carrito = session()->get('carrito', []);

    if (isset($carrito[$idProducto])) {

        unset($carrito[$idProducto]);

        session()->put('carrito', $carrito);
    }

    return redirect()
        ->route('carrito')
        ->with('success',
            'Producto eliminado del carrito.');
}
public function vaciar()
{
    session()->forget('carrito');

    return redirect()
        ->route('carrito')
        ->with('success',
            'Carrito vaciado correctamente.');
}
public function finalizar()
{
    if (!session()->has('id_usuario')) {

        return redirect()->route('login.form');
    }

    $persona = Persona::findOrFail(
        session('id_usuario')
    );

    if (
        empty($persona->telefono) ||
        empty($persona->dni) ||
        empty($persona->direccion) ||
        empty($persona->ciudad) ||
        empty($persona->provincia) ||
        empty($persona->codigo_postal)
    ) {

        return redirect()->route('perfil.completar');
    }

    session([
        'confirmando_compra' => true
    ]);
   
    return redirect()->route('carrito');
}
public function cancelarConfirmacion()
{
    session()->forget('confirmando_compra');

    return redirect()->route('carrito');
}
public function confirmarCompra()
{
    $carrito = session()->get('carrito', []);

    if (empty($carrito)) {

        return redirect()
            ->route('carrito')
            ->with(
                'error',
                'El carrito está vacío.'
            );
    }

    DB::beginTransaction();

    try {

        $total = 0;

        foreach ($carrito as $item) {

            $total +=
                $item['precio']
                * $item['cantidad'];
        }

        $venta = Venta::create([
            'id_cliente' => session('id_usuario'),
            'fecha' => now(),
            'estadoVenta' => 'activa',
            'total' => $total
        ]);

        foreach ($carrito as $idProducto => $item) {

            DetalleVenta::create([
                'id_venta' => $venta->id,
                'id_producto' => $idProducto,
                'detalle_cant' => $item['cantidad'],
                'detalle_precio' => $item['precio']
            ]);
        }

        DB::commit();

        session([
            'venta_activa' => $venta->id
        ]);

        return redirect()->route('pago');

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()
            ->route('carrito')
            ->with(
                'error',
                'Error al generar la compra.'
            );
    }
}
public function formPago()
{
    $venta = Venta::findOrFail(
        session('venta_activa')
    );

    return view(
        'frontend.pago',
        compact('venta')
    );
}

public function procesarPago(Request $request)
{
    $request->validate([
        'metodo_pago' => 'required'
    ]);

    DB::beginTransaction();

    try {

        $venta = Venta::findOrFail(
            session('venta_activa')
        );

        foreach ($venta->detalles as $detalle) {

            $producto = Producto::findOrFail(
                $detalle->id_producto
            );

            if (
                $producto->stock <
                $detalle->detalle_cant
            ) {

                DB::rollBack();

                return redirect()
                    ->route('carrito')
                    ->with(
                        'error',
                        'No hay stock suficiente para '
                        . $producto->nombre
                    );
            }
        }

        foreach ($venta->detalles as $detalle) {

            $producto = Producto::findOrFail(
                $detalle->id_producto
            );

            $producto->stock -=
                $detalle->detalle_cant;

            $producto->save();
        }

        $venta->update([
            'estadoVenta' => 'realizada',
            'metodo_pago' => $request->metodo_pago
        ]);

        DB::commit();

$mensaje = $request->metodo_pago == 'efectivo'
    ? 'Pedido registrado correctamente. Pago pendiente.'
    : 'Pago registrado correctamente. Compra realizada.';

$idVenta = $venta->id;

session()->forget('carrito');
session()->forget('venta_activa');
session()->forget('confirmando_compra');

return redirect()
    ->route('comprobante', $idVenta)
    ->with('success', $mensaje);
      

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()
            ->route('carrito')
            ->with(
                'error',
                'Error al procesar el pago.'
            );
    }
}
public function comprobante($id)
{
    $venta = Venta::with('detalles.producto')
        ->findOrFail($id);

    return view(
        'frontend.comprobante',
        compact('venta')
    );
}
}