<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function ver_catalogo($categoria = null) 
    {
        // Array con todos los productos del catálogo
        $todosLosProductos = [
            [
                'nombre'      => 'Limonero',
                'precio'      => 5000,
                'imagen'      => 'images/limoneroNuevo.png',
                'descripcion' => 'Ideal para macetas o jardín, frutos todo el año.',
                'categoria'   => 'frutales'
            ],
            [
                'nombre'      => 'Naranjo ',
                'precio'      => 5000,
                'imagen'      => 'images/imagesProduct/naranjo2.png',
                'descripcion' => 'Ideal para macetas o jardín, frutos todo el año.',
                'categoria'   => 'frutales'
            ],
            [
                'nombre'      => 'tomatera ',
                'precio'      => 5000,
                'imagen'      => 'images/imagesProduct/tomate2.png',
                'descripcion' => 'Ideal para huerta, frutos de un color rojo intenso que dan vida y sabor a tus dias.',
                'categoria'   => 'frutales'
            ],
            [
                'nombre'      => 'Rosal Importado',
                'precio'      => 4500,
                'imagen'      => 'images/imagesProduct/plantin-rosa.jpg',
                'descripcion' => 'Flores intensas y perfume duradero para tu jardín.',
                'categoria'   => 'florales'
            ],
            [
                'nombre'      => 'Petunias Mix',
                'precio'      => 1200,
                'imagen'      => 'images/imagesProduct/petunias.jpeg',
                'descripcion' => 'Colores vibrantes para colgar en balcones.',
                'categoria'   => 'florales' 
            ],
            [
                'nombre'      => 'Lirios',
                'precio'      => 6500,
                'imagen'      => 'images/imagesProduct/lirio.png',
                'descripcion' => 'Añadí elegancia y distinción a tu hogar o jardín con nuestros lirios en maceta.',
                'categoria'   => 'florales' 
            ],
            [
                'nombre'      => 'Lavanda',
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
                'imagen'      => 'images/imagesProduct/ficus.png',
                'descripcion' => 'La planta de interior más buscada por su elegancia.',
                'categoria'   => 'interior'
            ],

            [
                'nombre'      => 'Monstera',
                'precio'      => 9500,
                'imagen'      => 'images/imagesProduct/monstera.png',
                'descripcion' => 'Aportá un aire tropical y moderno a tus ambientes con la Monstera Deliciosa',
                'categoria'   => 'interior'
            ],
            [
                'nombre'      => 'Sansevieria (Lengua de Suegra)',
                'precio'      => 9500,
                'imagen'      => 'images/imagesProduct/lengua.png',
                'descripcion' => '"todoterreno" por excelencia. Además de ser extremadamente resistente, es una de las mejores purificadoras de aire',
                'categoria'   => 'interior'
            ],
            [
                'nombre'      => 'Romero',
                'precio'      => 3000,
                'imagen'      => 'images/imagesProduct/romero.png',
                'descripcion' => 'Sumá carácter y un aroma inconfundible a tu cocina con el Romero.',
                'categoria'   => 'aromaticas'
            ],
            [
                'nombre'      => 'Menta',
                'precio'      => 3000,
                'imagen'      => 'images/imagesProduct/menta.png',
                'descripcion' => 'Llevá frescura inmediata a tu cocina con nuestra Menta.',
                'categoria'   => 'aromaticas'
            ],
        ];
       // Si se recibe una categoría por parámetro
        if ($categoria) {
             // Filtra los productos que coincidan con esa categoría
            // strtolower se usa para evitar problemas con mayúsculas/minúsculas
            // array_values reordena el array para que Blade lo recorra bien
            $productos = array_values(array_filter($todosLosProductos, function($producto) use ($categoria) {
                return strtolower($producto['categoria']) === strtolower($categoria);
            }));
        } else {
             // Si no hay categoría, muestra todos los productos
            $productos = $todosLosProductos;
        }
        // Retorna la vista con los productos y la categoría seleccionada
        return view('frontend.productos', compact('productos', 'categoria'));
    }
}