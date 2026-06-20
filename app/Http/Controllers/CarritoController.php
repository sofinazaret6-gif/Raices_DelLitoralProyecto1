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
                ->with('error', 'No hay suficiente stock disponible.');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$idProducto])) {
            $carrito[$idProducto]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
        }

        return redirect()
            ->route('carrito')
            ->with('success', 'Cantidad actualizada correctamente.');
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
            ->with('success', 'Producto eliminado del carrito.');
    }

    public function vaciar()
    {
        session()->forget('carrito');

        return redirect()
            ->route('carrito')
            ->with('success', 'Carrito vaciado correctamente.');
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

    public function confirmarCompra(Request $request)
    {
        return redirect()->route('pago', ['total' => $request->input('total')]);
    }

    public function formPago(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()
                ->route('carrito')
                ->with('error', 'El carrito está vacío.');
        }

        $total = $request->input('total');

        if (!$total) {
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }

        return view(
            'frontend.pago',
            compact('total')
        );
    }

    public function procesarPago(Request $request)
    {
        session(['confirmando_compra' => true]);

        $request->validate([
            'metodo_pago' => 'required'
        ]);

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()
                ->route('carrito')
                ->with('error', 'El carrito está vacío.');
        }

        DB::beginTransaction();

        try {
            $total = 0;

            // Verificar stock actual
            foreach ($carrito as $idProducto => $item) {
                $producto = Producto::findOrFail($idProducto);

                if ($producto->stock < $item['cantidad']) {
                    DB::rollBack();
                    return redirect()
                        ->route('carrito')
                        ->with('error', 'No hay stock suficiente para ' . $producto->nombre);
                }

                $total += $item['precio'] * $item['cantidad'];
            }

            // Crear venta
            $venta = Venta::create([
                'id_cliente' => session('id_usuario'),
                'fecha' => now(),
                'estadoVenta' => 'realizada',
                'metodo_pago' => $request->metodo_pago,
                'total' => $total
            ]);

            // Crear detalles y descontar stock
            foreach ($carrito as $idProducto => $item) {
                DetalleVenta::create([
                    'id_venta' => $venta->id,
                    'id_producto' => $idProducto,
                    'detalle_cant' => $item['cantidad'],
                    'detalle_precio' => $item['precio']
                ]);

                $producto = Producto::findOrFail($idProducto);
                $producto->stock -= $item['cantidad'];
                $producto->save();
            }

            DB::commit();

            // Limpia el carrito local
            session()->forget('carrito');

            
            if ($request->metodo_pago === 'tarjeta') {
                $mensaje = 'Pago con tarjeta registrado correctamente.';
            } else {
                $mensaje = 'Pedido registrado correctamente en efectivo.';
            }

            
            return redirect()
                ->route('comprobante', $venta->id)
                ->with('success', $mensaje);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('carrito')
                ->with('error', 'Error al procesar el pago.');
        }
    }

    public function comprobante($id)
    {
        $venta = Venta::with('detalles.producto')->findOrFail($id);

        session()->forget('confirmando_compra');

        return view(
            'frontend.comprobante',
            compact('venta')
        );
    }

    public function misCompras()
    {
        $ventas = Venta::with('detalles.producto')
            ->where(
                'id_cliente',
                session('id_usuario')
            )
            ->orderBy('fecha', 'desc')
            ->get();

        return view(
            'frontend.mis-compras',
            compact('ventas')
        );
    }
}