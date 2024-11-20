@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Ventas</h1>

    <a href="{{ route('ventas.create') }}" class="mb-4 inline-block bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
        Registrar Venta
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th class="px-6 py-3">ID Venta</th>
                    <th class="px-6 py-3">Cliente</th>
                    <th class="px-6 py-3">Monto Total</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $venta->ID_venta }}</td>
                    <td class="px-6 py-4">{{ $venta->cliente->nombre }}</td>
                    <td class="px-6 py-4">S/ {{ number_format($venta->monto_total, 2) }}</td>
                    <td class="px-6 py-4">{{ $venta->fecha_compra }}</td>
                    <td class="px-6 py-4">{{ ucfirst($venta->estado) }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('ventas.show', $venta->ID_venta) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                            Ver
                        </a>
                        <form action="{{ route('ventas.destroy', $venta->ID_venta) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta venta?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
