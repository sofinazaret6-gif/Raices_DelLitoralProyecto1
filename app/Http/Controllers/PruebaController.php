<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function ver_catalogo($categoria = null) 
    {
        $todosLosProductos = [
            [
                'nombre'      => 'Limonero',
                'precio'      => 5000,
                'imagen'      => 'images/limoneroNuevo.png',
                'descripcion' => 'Ideal para macetas o jardín, frutos todo el año.',
                'categoria'   => 'frutales'
            ],
            [
                'nombre'      => 'Rosal Importado',
                'precio'      => 4500,
                'imagen'      => 'https://images.unsplash.com/photo-1559563458-527698bf5295',
                'descripcion' => 'Flores intensas y perfume duradero para tu jardín.',
                'categoria'   => 'florales' // <--- AHORA SÍ COINCIDE CON EL BOTÓN
            ],
            [
                'nombre'      => 'Petunias Mix',
                'precio'      => 1200,
                'imagen'      => 'https://images.unsplash.com/photo-1596722265738-4318e77c7428',
                'descripcion' => 'Colores vibrantes para colgar en balcones.',
                'categoria'   => 'florales' // <--- OTRO MÁS PARA FLORALES
            ],
            [
                'nombre'      => 'Planta Aromática (Lavanda)',
                'precio'      => 3000,
                'imagen'      => 'images/lavanda.png',
                'descripcion' => 'Fragancia relajante y fácil cuidado a pleno sol.',
                'categoria'   => 'aromaticas'
            ],
            [
                'nombre'      => 'Tierra Orgánica 10kg',
                'precio'      => 2500,
                'imagen'      => 'images/tierraNuevo.png',
                'descripcion' => 'Sustrato abonado Raíces del Litoral.',
                'categoria'   => 'accesorios'
            ],
            [
                'nombre'      => 'Ficus Pandurata',
                'precio'      => 9500,
                'imagen'      => 'https://images.unsplash.com/photo-1597055181300-e3633a207519',
                'descripcion' => 'La planta de interior más buscada por su elegancia.',
                'categoria'   => 'interior'
            ],
        ];

        if ($categoria) {
            // El array_values es clave para que el @foreach de Blade no falle
            $productos = array_values(array_filter($todosLosProductos, function($producto) use ($categoria) {
                return strtolower($producto['categoria']) === strtolower($categoria);
            }));
        } else {
            $productos = $todosLosProductos;
        }

        return view('frontend.productos', compact('productos', 'categoria'));
    }
}