<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function ventas(Request $request)
    {
        $query = Venta::query();

        // Filtrar por fechas
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_compra', [$request->fecha_inicio, $request->fecha_fin]);
        }

        // Filtrar por cliente
        if ($request->filled('ID_cliente')) {
            $query->where('ID_cliente', $request->ID_cliente);
        }

        // Filtrar por estado
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $ventas = $query->with(['cliente', 'detalleVentas.producto'])->get();

        return view('reportes.ventas', compact('ventas'));
    }

    public function inventario()
    {
        $productos = Producto::all();
        return view('reportes.inventario', compact('productos'));
    }

   

    public function clientes()
    {
        $clientes = Cliente::with('prescripciones')->orderBy('nombre')->get();

        return view('reportes.clientes', compact('clientes'));
    }
}
