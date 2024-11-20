@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Clientes</h1>

    <a href="{{ route('clientes.create') }}" class="mb-4 inline-block bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
        Agregar Cliente
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">DNI</th>
                    <th class="px-6 py-3">Fecha de Nacimiento</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Correo</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $cliente->nombre }}</td>
                    <td class="px-6 py-4">{{ $cliente->dni }}</td>
                    <td class="px-6 py-4">{{ $cliente->fecha_nacimiento }}</td>
                    <td class="px-6 py-4">{{ $cliente->telefono }}</td>
                    <td class="px-6 py-4">{{ $cliente->correo }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        @if($cliente->prescripciones->isNotEmpty())
                            <a href="{{ route('prescripciones.show', $cliente->ID_cliente) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ver Prescripciones</a>
                        @else
                            <a href="{{ route('prescripciones.create', $cliente->ID_cliente) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Agregar Prescripción</a>
                        @endif

                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#63038C] text-white px-2 py-1 rounded hover:bg-red-600 transition">
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
