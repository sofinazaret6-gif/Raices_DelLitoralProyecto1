<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * listado de productos filtrado por categoría o por el buscador
     */
    public function ver_catalogo(Request $request, $id_categoria = null) 
    {
     
        if ($id_categoria) {
            
            
            $categoriaActual = Categoria::find($id_categoria);

            if ($categoriaActual) {
        
                $productos = Producto::where('id_categoria', $id_categoria)
                                     ->where('estado', true)
                                     ->get(); 
            } else {
                $productos = collect();
            }
            
        } else {
            
            $query = Producto::with('categoria')->where('estado', true);

            
            if ($request->has('buscar') && $request->buscar != '') {
                $query->where('nombre', 'LIKE', '%' . $request->buscar . '%');
            }

            $productos = $query->get();
        }

        return view('frontend.productos', [
            'productos' => $productos,
            'categoria' => $id_categoria
        ]);
    }

    /**
     *   FUNCIONES DEL ADMINISTRADOR
     */

    // Muestra la lista de productos en el Panel de Control del Admin
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        
        $categorias = Categoria::all();
        
        return view('dashboard.gestion_productos', compact('productos', 'categorias'));
    }

    public function gestionStock()
    {
        $productos = Producto::with('categoria')->get();
        return view('dashboard.lista_productos', compact('productos'));
    }

  
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
            'estado'       => true, // visible por defecto
        ]);

        return redirect()->route('productos.index')->with('success', '¡Producto añadido a la base de datos!');
    }

    
    public function destroy($id)
    {
        
        $producto = Producto::findOrFail($id);

        
        if ($producto->imagen && !str_contains($producto->imagen, 'images/')) {
            // Borra la foto de la carpeta storage/app/public/productos
            Storage::disk('public')->delete($producto->imagen);
        }

        
        $producto->delete();

        // Redireccionamos al listado con un mensaje de éxito para la alerta
        return redirect()->route('productos.index')->with('success', 'El producto ha sido eliminado correctamente del sistema.');
    }

    
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
     * visibilidad del producto (Activo/Inactivo)
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
    
    /**
     * Retorna la vista principal del catálogo de categorías
     */
    public function mostrarCategorias()
    {
        return view('frontend.catalogo');
    }
}