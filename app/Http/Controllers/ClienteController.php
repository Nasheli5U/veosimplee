<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('prescripciones')->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:clientes,dni',
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'correo' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'preferencias_contacto' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:clientes,dni,' . $id,
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'correo' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'preferencias_contacto' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function show($id)
    {
        $cliente = Cliente::with('prescripciones')->findOrFail($id);

        return view('prescripciones.index', compact('cliente'));
    }
}
