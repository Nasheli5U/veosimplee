<?php

namespace App\Http\Controllers;

use App\Models\Prescripcion;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PrescripcionController extends Controller
{
    public function create($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente);

        return view('prescripciones.create', compact('cliente'));
    }

    public function store(Request $request, $id_cliente)
    {
        $request->validate([
            'esfera_od' => 'required|string|max:10',
            'esfera_oi' => 'required|string|max:10',
            'cilindro_od' => 'required|string|max:10',
            'cilindro_oi' => 'required|string|max:10',
            'eje_od' => 'required|string|max:10',
            'eje_oi' => 'required|string|max:10',
            'adicionales' => 'nullable|string',
            'fecha_prescripcion' => 'required|date',
        ]);

        Prescripcion::create([
            'ID_cliente' => $id_cliente,
            'esfera_od' => $request->esfera_od,
            'esfera_oi' => $request->esfera_oi,
            'cilindro_od' => $request->cilindro_od,
            'cilindro_oi' => $request->cilindro_oi,
            'eje_od' => $request->eje_od,
            'eje_oi' => $request->eje_oi,
            'adicionales' => $request->adicionales,
            'fecha_prescripcion' => $request->fecha_prescripcion,
        ]);

        return redirect()->route('prescripciones.show', $id_cliente)->with('success', 'Prescripción agregada correctamente.');
    }

    public function show($id_cliente)
    {
        // Obtener el cliente junto con sus prescripciones
        $cliente = Cliente::with('prescripciones')->findOrFail($id_cliente);

        // Retornar la vista con los datos del cliente y sus prescripciones
        return view('prescripciones.show', compact('cliente'));
    }


    public function destroy($id_prescripcion)
    {
        // Buscar la prescripción por ID y eliminarla
        $prescripcion = Prescripcion::findOrFail($id_prescripcion);
        $id_cliente = $prescripcion->ID_cliente; // Guardar el ID del cliente para redirigir

        $prescripcion->delete();

        // Redirigir al listado de prescripciones del cliente
        return redirect()->route('prescripciones.show', $id_cliente)->with('success', 'Prescripción eliminada correctamente.');
    }


}
