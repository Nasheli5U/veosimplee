<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:subcategorias',
        ]);

        Subcategoria::create($request->all());

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría creada correctamente.');
    }

    public function edit(Subcategoria $subcategoria)
    {
        $categorias = Categoria::all();
        return view('subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            'nombre' => 'required|unique:subcategorias,nombre,' . $subcategoria->ID_subcategoria,
        ]);

        $subcategoria->update($request->all());

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría actualizada correctamente.');
    }

    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría eliminada correctamente.');
    }
}
