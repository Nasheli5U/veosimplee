@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5" style="color: #731259;">Agregar Marca</h1>
    <form action="{{ route('marcas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-medium mb-2">Nombre de la Marca</label>
            <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" placeholder="Ejemplo: Ray-Ban" value="{{ old('nombre') }}">
            @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">Guardar Marca</button>
        <a href="{{ route('marcas.index') }}" class="ml-4 text-gray-500 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
