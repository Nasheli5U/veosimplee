@props(['cliente'])

<!-- DNI -->
<div class="mb-4">
    <label for="dni" class="block text-gray-700 font-medium mb-2">DNI</label>
    <input type="text" name="dni" id="dni" value="{{ $cliente->dni ?? old('dni') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
</div>

<!-- Nombre -->
<div class="mb-4">
    <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre ?? old('nombre') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
</div>

<!-- Fecha de Nacimiento -->
<div class="mb-4">
    <label for="fecha_nacimiento" class="block text-gray-700 font-medium mb-2">Fecha de Nacimiento</label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $cliente->fecha_nacimiento ?? old('fecha_nacimiento') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
</div>

<!-- Teléfono -->
<div class="mb-4">
    <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono ?? old('telefono') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
</div>

<!-- Correo -->
<div class="mb-4">
    <label for="correo" class="block text-gray-700 font-medium mb-2">Correo</label>
    <input type="email" name="correo" id="correo" value="{{ $cliente->correo ?? old('correo') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
</div>

<!-- Dirección -->
<div class="mb-4">
    <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección</label>
    <input type="text" name="direccion" id="direccion" value="{{ $cliente->direccion ?? old('direccion') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]">
</div>

<!-- Preferencias de Contacto -->
<div class="mb-4">
    <label for="preferencias_contacto" class="block text-gray-700 font-medium mb-2">Preferencias de Contacto</label>
    <textarea name="preferencias_contacto" id="preferencias_contacto" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="3">{{ $cliente->preferencias_contacto ?? old('preferencias_contacto') }}</textarea>
</div>

<!-- Observaciones -->
<div class="mb-4">
    <label for="observaciones" class="block text-gray-700 font-medium mb-2">Observaciones</label>
    <textarea name="observaciones" id="observaciones" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="3">{{ $cliente->observaciones ?? old('observaciones') }}</textarea>
</div>
