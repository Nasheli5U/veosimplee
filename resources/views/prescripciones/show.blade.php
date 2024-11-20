@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Prescripciones de {{ $cliente->nombre }}</h1>

    <!-- Botón para agregar una nueva prescripción -->
    <a href="{{ route('prescripciones.create', $cliente->ID_cliente) }}" class="mb-4 inline-block bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
        Agregar Prescripción
    </a>

    @if($cliente->prescripciones->isEmpty())
        <p class="text-gray-700">Este cliente no tiene prescripciones registradas.</p>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                    <tr>
                        <th class="px-6 py-3">Fecha de Prescripción</th>
                        <th class="px-6 py-3">Esfera OD</th>
                        <th class="px-6 py-3">Esfera OI</th>
                        <th class="px-6 py-3">Cilindro OD</th>
                        <th class="px-6 py-3">Cilindro OI</th>
                        <th class="px-6 py-3">Eje OD</th>
                        <th class="px-6 py-3">Eje OI</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliente->prescripciones as $prescripcion)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $prescripcion->fecha_prescripcion }}</td>
                        <td class="px-6 py-4">{{ $prescripcion->esfera_od }}</td>
                        <td class="px-6 py-4">{{ $prescripcion->esfera_oi }}</td>
                        <td class="px-6 py-4">{{ $prescripcion->cilindro_od }}</td>
                        <td class="px-6 py-4">{{ $prescripcion->cilindro_oi }}</td>
                        <td class="px-6 py-4">{{ $prescripcion->eje_od }}</td>
                        <td class="px-6 py-4">{{ $prescripcion->eje_oi }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <!-- Botón para editar prescripción -->
                            <a href="{{ route('prescripciones.edit', $prescripcion->ID_prescripcion) }}" class="bg-[#7503A6] text-white px-2 py-1 rounded hover:bg-[#A61B81] transition">
                                Editar
                            </a>
                            <!-- Botón para eliminar prescripción -->
                            <form action="{{ route('prescripciones.destroy', $prescripcion->ID_prescripcion) }}" method="POST">
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
    @endif
</div>
@endsection
