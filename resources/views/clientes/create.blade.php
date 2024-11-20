@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Agregar Cliente</h1>

    <!-- Mostrar errores -->
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- DNI -->
        <div class="mb-4">
            <label for="dni" class="block text-gray-700 font-medium mb-2">DNI</label>
            <input type="text" name="dni" id="dni" value="{{ old('dni') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" maxlength="8" required>
        </div>

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre Completo</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mb-4">
            <label for="fecha_nacimiento" class="block text-gray-700 font-medium mb-2">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
        </div>

        <!-- Correo -->
        <div class="mb-4">
            <label for="correo" class="block text-gray-700 font-medium mb-2">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" value="{{ old('correo') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
        </div>

        <!-- Teléfono -->
        <div class="mb-4">
            <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
        </div>

        <!-- Dirección -->
        <div class="mb-4">
            <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección</label>
            <textarea name="direccion" id="direccion" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="3">{{ old('direccion') }}</textarea>
        </div>

        <!-- Preferencias de Contacto -->
        <div class="mb-4">
            <label for="preferencias_contacto" class="block text-gray-700 font-medium mb-2">Preferencias de Contacto</label>
            <textarea name="preferencias_contacto" id="preferencias_contacto" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="3">{{ old('preferencias_contacto') }}</textarea>
        </div>

        <!-- Observaciones -->
        <div class="mb-4">
            <label for="observaciones" class="block text-gray-700 font-medium mb-2">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="4">{{ old('observaciones') }}</textarea>
        </div>

        <!-- Botón Guardar -->
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Guardar Cliente
        </button>
    </form>
</div>
@endsection
