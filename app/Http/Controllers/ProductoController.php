<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function ver_catalogo($slug_categoria = null) 
    {
        // 1. Seleccionó una categoría
        if ($slug_categoria) {
            $categoriaActual = Categoria::where('descripcion', $slug_categoria)->first();

            // MODIFICADO: Traemos de la categoría solo los productos que tengan el estado activo (visibles)
            if ($categoriaActual) {
                $productos = $categoriaActual->productos()->where('estado', true)->get(); 
            } else {
                $productos = collect();
            }
        } else {
            // 2. MODIFICADO: Si no seleccionó categoría, traemos TODOS los productos VISIBLES para los clientes
            $productos = Producto::with('categoria')->where('estado', true)->get();
        }

        return view('frontend.productos', [
            'productos' => $productos,
            'categoria' => $slug_categoria
        ]);
    }

    /**
     * LAS FUNCIONES DEL ADMINISTRADOR
     */

    // Muestra la lista de productos en el Panel de Control del Admin
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        // ARREGLADO: Ahora también trae las categorías para cargarlas en el modal de edición
        $categorias = Categoria::all();
        
        return view('dashboard.gestion_productos', compact('productos', 'categorias'));
    }

    
    public function gestionStock()
    {
        $productos = Producto::with('categoria')->get();
        return view('dashboard.lista_productos', compact('productos'));
    }

    // Guarda un producto nuevo que el Admin completó en el formulario
    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|string|max:100',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'descripcion'  => 'nullable|string',
            'id_categoria' => 'required|exists:categorias,id',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $nombreImagen = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create([
            'nombre'       => $request->nombre,
            'precio'       => $request->precio,
            'stock'        => $request->stock,
            'descripcion'  => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'imagen'       => $nombreImagen,
            'estado'       => true, // Se registra visible por defecto
        ]);

        return redirect()->route('productos.index')->with('success', '¡Producto añadido a la base de datos!');
    }

    // Elimina el producto de la DB y limpia su foto del storage público
    public function destroy($id)
    {
        // Buscamos el producto por su ID, si no existe lanza un error 404
        $producto = Producto::findOrFail($id);

        // Verificamos si tiene una imagen guardada en el Storage (evitamos borrar las locales del Seeder)
        if ($producto->imagen && !str_contains($producto->imagen, 'images/')) {
            // Borra la foto de la carpeta storage/app/public/productos
            Storage::disk('public')->delete($producto->imagen);
        }

        // Eliminamos el registro de la base de datos
        $producto->delete();

        // Redireccionamos al listado con un mensaje de éxito para la alerta
        return redirect()->route('productos.index')->with('success', 'El producto ha sido eliminado correctamente del sistema.');
    }

    // Procesa los cambios de edición del lápiz
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre'       => 'required|string|max:100',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'descripcion'  => 'nullable|string',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->id_categoria = $request->id_categoria;
        $producto->descripcion = $request->descripcion;

        // Si subiste una imagen nueva, borramos la vieja y guardamos la nueva
        if ($request->hasFile('imagen')) {
            if ($producto->imagen && !str_contains($producto->imagen, 'images/')) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', '¡Producto actualizado correctamente!');
    }

    /**
     * 👁️ NUEVA FUNCIÓN: Alternar el estado de visibilidad del producto (Activo/Inactivo)
     */
    public function toggleEstado($id)
    {
        $producto = Producto::findOrFail($id);
        
        // Invierte el valor binario (true/false)
        $producto->estado = !$producto->estado;
        $producto->save();

        $mensaje = $producto->estado 
            ? "El producto '{$producto->nombre}' ahora es visible en la tienda." 
            : "El producto '{$producto->nombre}' ha sido ocultado de la tienda.";

        return redirect()->back()->with('success', $mensaje);
    }

    /**
     * 🔄 NUEVA FUNCIÓN: Actualizar únicamente el stock del producto desde el modal compacto
     */
    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->stock = $request->input('stock');
        $producto->save();

        return redirect()->back()->with('success', "Stock del producto '{$producto->nombre}' actualizado a {$producto->stock} unidades.");
    }
}