@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5" style="color: #731259;">Productos</h1>
    <a href="{{ route('productos.create') }}" class="mb-4 inline-block bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
        Agregar Producto
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Categoría</th>
                    <th class="px-6 py-3">Subcategoría</th>
                    <th class="px-6 py-3">Marca</th>
                    <th class="px-6 py-3">Material</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $producto->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->categoria->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->subcategoria->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->marca->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->material->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->stock }}</td>
                    <td class="px-6 py-4 flex">
                        <a href="{{ route('productos.edit', $producto) }}" class="text-[#731259] hover:underline mr-4">Editar</a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[#A61B81] hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
