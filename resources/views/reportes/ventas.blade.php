@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Reporte de Ventas</h1>

    <!-- Filtros -->
    <form method="GET" action="{{ route('reportes.ventas') }}" class="mb-6">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="fecha_inicio" class="block text-gray-700">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="fecha_fin" class="block text-gray-700">Fecha Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="estado" class="block text-gray-700">Estado</label>
                <select name="estado" id="estado" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">Todos</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Pagada">Pagada</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
            </div>
        </div>
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded mt-4 hover:bg-[#7503A6]">
            Generar Reporte
        </button>
    </form>

    <!-- Resultados -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Cliente</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $venta->fecha_compra }}</td>
                    <td class="px-6 py-4">{{ $venta->cliente->nombre }}</td>
                    <td class="px-6 py-4">{{ $venta->estado }}</td>
                    <td class="px-6 py-4">S/ {{ number_format($venta->monto_total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
