@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5" style="color: #731259;">Agregar Material</h1>
    <form action="{{ route('materiales.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-medium mb-2">Nombre del Material</label>
            <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" placeholder="Ejemplo: Acetato" value="{{ old('nombre') }}">
            @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-[#
