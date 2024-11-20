@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Reporte de Clientes</h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-[#F2F2F2] text-gray-800">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">DNI</th>
                    <th class="px-6 py-3">Correo</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Total de Prescripciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $cliente->nombre }}</td>
                    <td class="px-6 py-4">{{ $cliente->dni }}</td>
                    <td class="px-6 py-4">{{ $cliente->correo }}</td>
                    <td class="px-6 py-4">{{ $cliente->telefono }}</td>
                    <td class="px-6 py-4">{{ $cliente->prescripciones->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
