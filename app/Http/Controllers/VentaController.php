<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        // Obtener todas las ventas con su cliente
        $ventas = Venta::with('cliente')->get();

        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        // Obtener clientes y productos disponibles
        $clientes = Cliente::all();
        $productos = Producto::where('stock', '>', 0)->get();

        return view('ventas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_cliente' => 'required|exists:clientes,ID_cliente',
            'estado' => 'required|in:Pendiente,Pagada,Cancelada', // Validación para estado
            'productos' => 'required|array',
            'productos.*.ID_producto' => 'required|exists:productos,ID_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.adicionales' => 'nullable|string',
            'productos.*.costo_adicional' => 'nullable|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0', // Validación para descuento
        ]);

        // Crear la venta
        $venta = Venta::create([
            'ID_cliente' => $request->ID_cliente,
            'fecha_compra' => now(),
            'estado' => $request->estado, // Utilizar el estado proporcionado por el usuario
            'monto_total' => 0, // Inicialmente 0, se actualizará después
        ]);

        $monto_total = 0;

        // Procesar los detalles de la venta
        foreach ($request->productos as $productoData) {
            $producto = Producto::findOrFail($productoData['ID_producto']);
            $cantidad = $productoData['cantidad'];
            $adicionales = $productoData['adicionales'] ?? null;
            $costo_adicional = $productoData['costo_adicional'] ?? 0;

            $subtotal = ($producto->precio * $cantidad) + $costo_adicional;

            // Crear el detalle de la venta
            DetalleVenta::create([
                'ID_venta' => $venta->ID_venta,
                'ID_producto' => $producto->ID_producto,
                'adicionales' => $adicionales,
                'costo_adicional' => $costo_adicional,
                'subtotal' => $subtotal,
            ]);

            // Reducir el stock del producto
            $producto->decrement('stock', $cantidad);

            // Sumar al monto total
            $monto_total += $subtotal;
        }

        // Aplicar descuento si existe
        $descuento = $request->descuento ?? 0;
        $monto_total -= $descuento;

        // Actualizar el monto total de la venta
        $venta->update(['monto_total' => $monto_total]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }

    public function show($id)
    {
        // Obtener la venta con su cliente y detalles
        $venta = Venta::with(['cliente', 'detalleVentas.producto'])->findOrFail($id);

        return view('ventas.show', compact('venta'));
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);

        // Eliminar los detalles de la venta
        $venta->detalleVentas()->delete();

        // Eliminar la venta
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}
