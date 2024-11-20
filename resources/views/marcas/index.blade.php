@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5" style="color: #731259;">Marcas</h1>
    <a href="{{ route('marcas.create') }}" class="mb-4 inline-block bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
        Agregar Marca
    </a>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th scope="col" class="p-4">Nombre</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcas as $marca)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $marca->nombre }}</td>
                    <td class="flex items-center px-6 py-4">
                        <a href="{{ route('marcas.edit', $marca) }}" class="text-[#731259] hover:underline">Editar</a>
                        <form action="{{ route('marcas.destroy', $marca) }}" method="POST" class="ml-3">
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
