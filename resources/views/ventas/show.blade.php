@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Detalles de la Venta</h1>

    <!-- Información de la Venta -->
    <div class="bg-white p-6 rounded shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4" style="color: #7503A6;">Información General</h2>
        <p><strong>ID Venta:</strong> {{ $venta->ID_venta }}</p>
        <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
        <p><strong>Fecha de Compra:</strong> {{ $venta->fecha_compra }}</p>
        <p><strong>Estado:</strong> <span class="px-2 py-1 rounded text-white" style="background-color: {{ $venta->estado === 'Pagada' ? '#28a745' : ($venta->estado === 'Pendiente' ? '#ffc107' : '#dc3545') }}">
            {{ $venta->estado }}
        </span></p>
        <p><strong>Monto Total:</strong> S/ {{ number_format($venta->monto_total, 2) }}</p>
    </div>

    <!-- Detalles de los Productos -->
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-4" style="color: #7503A6;">Productos</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                    <tr>
                        <th class="px-6 py-3">Producto</th>
                        <th class="px-6 py-3">Cantidad</th>
                        <th class="px-6 py-3">Adicionales</th>
                        <th class="px-6 py-3">Costo Adicional</th>
                        <th class="px-6 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($venta->detalleVentas as $detalle)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $detalle->producto->nombre }}</td>
                        <td class="px-6 py-4">{{ $detalle->cantidad }}</td>
                        <td class="px-6 py-4">{{ $detalle->adicionales ?? 'N/A' }}</td>
                        <td class="px-6 py-4">S/ {{ number_format($detalle->costo_adicional, 2) }}</td>
                        <td class="px-6 py-4">S/ {{ number_format($detalle->subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botón Volver -->
    <div class="mt-6">
        <a href="{{ route('ventas.index') }}" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Volver al Listado de Ventas
        </a>
    </div>
</div>
@endsection
