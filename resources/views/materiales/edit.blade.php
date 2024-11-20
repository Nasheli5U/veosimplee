@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5" style="color: #731259;">Editar Material</h1>
    <form action="{{ route('materiales.update', $material) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-medium mb-2">Nombre del Material</label>
            <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" value="{{ $material->nombre }}">
            @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">Guardar Cambios</button>
        <a href="{{ route('materiales.index') }}" class="ml-4 text-gray-500 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
