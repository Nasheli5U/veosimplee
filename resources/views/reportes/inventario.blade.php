@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Reporte de Inventario</h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th class="px-6 py-3">Producto</th>
                    <th class="px-6 py-3">Categoría</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3">Precio</th>
                    <th class="px-6 py-3">Última Actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $producto->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->categoria->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->stock }}</td>
                    <td class="px-6 py-4">{{ number_format($producto->precio, 2) }}</td>
                    <td class="px-6 py-4">{{ $producto->updated_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
