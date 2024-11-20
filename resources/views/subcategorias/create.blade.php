@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Agregar Subcategoría</h1>
    <form action="{{ route('subcategorias.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre de la Subcategoría</label>
            <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" placeholder="Ejemplo: Lentes de Sol" required>
            @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Guardar Subcategoría
        </button>
    </form>
</div>
@endsection
