<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        return view('materiales.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|unique:materiales']);
        Material::create($request->all());
        return redirect()->route('materiales.index')->with('success', 'Material creado correctamente.');
    }

    public function edit(Material $material)
    {
        return view('materiales.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate(['nombre' => 'required|unique:materiales,nombre,' . $material->ID_material]);
        $material->update($request->all());
        return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado correctamente.');
    }
}
