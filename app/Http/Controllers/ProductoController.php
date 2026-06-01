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

            // Traemos solo sus productos
            if ($categoriaActual) {
                $productos = $categoriaActual->productos; 
            } else {
                $productos = collect();
            }
        } else {
            // 2. Si no, traemos TODOS los productos de la DB
            $productos = Producto::with('categoria')->get();
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
        // ARREGLADO: Ahora apunta a tu archivo real en la carpeta de Sofi
        return view('dashboard.gestion_productos', compact('productos'));
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
}