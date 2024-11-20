@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Agregar Prescripción para {{ $cliente->nombre }}</h1>

    <form action="{{ route('prescripciones.store', ['ID_cliente' => $cliente->id]) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Esfera OD -->
        <div class="mb-4">
            <label for="esfera_od" class="block text-gray-700 font-medium mb-2">Esfera OD</label>
            <input type="text" name="esfera_od" id="esfera_od" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <!-- Esfera OI -->
        <div class="mb-4">
            <label for="esfera_oi" class="block text-gray-700 font-medium mb-2">Esfera OI</label>
            <input type="text" name="esfera_oi" id="esfera_oi" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <!-- Cilindro OD -->
        <div class="mb-4">
            <label for="cilindro_od" class="block text-gray-700 font-medium mb-2">Cilindro OD</label>
            <input type="text" name="cilindro_od" id="cilindro_od" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <!-- Cilindro OI -->
        <div class="mb-4">
            <label for="cilindro_oi" class="block text-gray-700 font-medium mb-2">Cilindro OI</label>
            <input type="text" name="cilindro_oi" id="cilindro_oi" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <!-- Eje OD -->
        <div class="mb-4">
            <label for="eje_od" class="block text-gray-700 font-medium mb-2">Eje OD</label>
            <input type="text" name="eje_od" id="eje_od" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <!-- Eje OI -->
        <div class="mb-4">
            <label for="eje_oi" class="block text-gray-700 font-medium mb-2">Eje OI</label>
            <input type="text" name="eje_oi" id="eje_oi" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <!-- Adicionales -->
        <div class="mb-4">
            <label for="adicionales" class="block text-gray-700 font-medium mb-2">Adicionales</label>
            <textarea name="adicionales" id="adicionales" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" rows="4"></textarea>
        </div>

        <!-- Fecha de Prescripción -->
        <div class="mb-4">
            <label for="fecha_prescripcion" class="block text-gray-700 font-medium mb-2">Fecha de Prescripción</label>
            <input type="date" name="fecha_prescripcion" id="fecha_prescripcion" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>

        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Guardar Prescripción
        </button>
    </form>
</div>
@endsection
