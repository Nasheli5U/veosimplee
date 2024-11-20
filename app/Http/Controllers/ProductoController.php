<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Marca;
use App\Models\Material;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos con relaciones
        $productos = Producto::with(['categoria', 'subcategoria', 'marca', 'material', 'colores'])->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        // Obtener datos necesarios para el formulario
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $marcas = Marca::all();
        $materiales = Material::all();
        return view('productos.create', compact('categorias', 'subcategorias', 'marcas', 'materiales'));
    }

    public function store(Request $request)
    {
        // Validar datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ID_categoria' => 'required|exists:categorias,ID_categoria',
            'ID_subcategoria' => 'required|exists:subcategorias,ID_subcategoria',
            'ID_marca' => 'required|exists:marcas,ID_marca',
            'ID_material' => 'required|exists:materiales,ID_material',
            'descripcion' => 'nullable|string',
            'codigo_producto' => 'required|unique:productos,codigo_producto',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'colores.*.nombre' => 'required|string|max:255',
            'colores.*.imagen' => 'nullable|image|max:2048',
        ]);

        // Crear el producto
        $producto = Producto::create($request->only([
            'nombre', 'ID_categoria', 'ID_subcategoria', 'ID_marca', 'ID_material', 'descripcion', 'codigo_producto', 'stock', 'precio'
        ]));

        // Agregar colores al producto
        if ($request->has('colores')) {
            foreach ($request->colores as $color) {
                $imagenPath = isset($color['imagen']) ? $color['imagen']->store('colores', 'public') : null;

                $producto->colores()->create([
                    'nombre' => $color['nombre'],
                    'imagen' => $imagenPath,
                ]);
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        // Obtener datos para el formulario de edición
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $marcas = Marca::all();
        $materiales = Material::all();
        return view('productos.edit', compact('producto', 'categorias', 'subcategorias', 'marcas', 'materiales'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Validar datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ID_categoria' => 'required|exists:categorias,ID_categoria',
            'ID_subcategoria' => 'required|exists:subcategorias,ID_subcategoria',
            'ID_marca' => 'required|exists:marcas,ID_marca',
            'ID_material' => 'required|exists:materiales,ID_material',
            'descripcion' => 'nullable|string',
            'codigo_producto' => 'required|unique:productos,codigo_producto,' . $producto->ID_producto,
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'colores.*.nombre' => 'required|string|max:255',
            'colores.*.imagen' => 'nullable|image|max:2048',
        ]);

        // Actualizar el producto
        $producto->update($request->only([
            'nombre', 'ID_categoria', 'ID_subcategoria', 'ID_marca', 'ID_material', 'descripcion', 'codigo_producto', 'stock', 'precio'
        ]));

        // Actualizar colores
        if ($request->has('colores')) {
            foreach ($request->colores as $color) {
                $imagenPath = isset($color['imagen']) ? $color['imagen']->store('colores', 'public') : null;

                $producto->colores()->updateOrCreate(
                    ['ID_color' => $color['ID_color'] ?? null],
                    ['nombre' => $color['nombre'], 'imagen' => $imagenPath]
                );
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
