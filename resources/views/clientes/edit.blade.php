@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- DNI -->
        <div class="mb-4">
            <label for="dni" class="block text-gray-700 font-medium mb-2">DNI</label>
            <input type="text" name="dni" id="dni" value="{{ $cliente->dni }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- Teléfono -->
        <div class="mb-4">
            <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
        </div>

        <!-- Correo -->
        <div class="mb-4">
            <label for="correo" class="block text-gray-700 font-medium mb-2">Correo</label>
            <input type="email" name="correo" id="correo" value="{{ $cliente->correo }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
        </div>

        <!-- Dirección -->
        <div class="mb-4">
            <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ $cliente->direccion }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
        </div>

        <!-- Preferencias de Contacto -->
        <div class="mb-4">
            <label for="preferencias_contacto" class="block text-gray-700 font-medium mb-2">Preferencias de Contacto</label>
            <textarea name="preferencias_contacto" id="preferencias_contacto" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="4">{{ $cliente->preferencias_contacto }}</textarea>
        </div>

        <!-- Botón Guardar -->
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Actualizar Cliente
        </button>
    </form>
</div>
@endsection
