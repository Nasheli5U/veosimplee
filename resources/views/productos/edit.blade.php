@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Editar Producto</h1>
    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- Categoría -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Categoría</label>
            <select name="ID_categoria" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->ID_categoria }}" {{ $producto->ID_categoria == $categoria->ID_categoria ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Subcategoría -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Subcategoría</label>
            <select name="ID_subcategoria" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                @foreach($subcategorias as $subcategoria)
                <option value="{{ $subcategoria->ID_subcategoria }}" {{ $producto->ID_subcategoria == $subcategoria->ID_subcategoria ? 'selected' : '' }}>
                    {{ $subcategoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Marca -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Marca</label>
            <select name="ID_marca" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                @foreach($marcas as $marca)
                <option value="{{ $marca->ID_marca }}" {{ $producto->ID_marca == $marca->ID_marca ? 'selected' : '' }}>
                    {{ $marca->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Material -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Material</label>
            <select name="ID_material" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                @foreach($materiales as $material)
                <option value="{{ $material->ID_material }}" {{ $producto->ID_material == $material->ID_material ? 'selected' : '' }}>
                    {{ $material->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Stock</label>
            <input type="number" name="stock" value="{{ $producto->stock }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" min="0" required>
        </div>

        <div class="mb-4">
            <label for="precio" class="block text-gray-700 font-medium mb-2">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
        </div>


        <!-- Colores Existentes -->
        <div id="colores-container" class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Colores</label>
            @foreach($producto->colores as $index => $color)
            <div class="mb-4" id="color-{{ $index }}">
                <input type="hidden" name="colores[{{ $index }}][ID_color]" value="{{ $color->ID_color }}">
                <input type="text" name="colores[{{ $index }}][nombre]" value="{{ $color->nombre }}" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" placeholder="Nombre del color" required>
                <input type="file" name="colores[{{ $index }}][imagen]" class="w-full border-gray-300 rounded-lg shadow-sm">
                @if($color->imagen)
                <p class="mt-2 text-sm text-gray-500">Imagen actual: <a href="{{ asset('storage/' . $color->imagen) }}" target="_blank" class="text-[#731259] underline">Ver Imagen</a></p>
                @endif
                <button type="button" onclick="eliminarColor({{ $index }})" class="mt-2 bg-[#A61B81] text-white px-2 py-1 rounded hover:bg-[#7503A6] transition">Eliminar</button>
            </div>
            @endforeach
        </div>

        <!-- Botón para agregar nuevo color -->
        <button id="agregar-color" type="button" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition mb-4">
            Agregar Nuevo Color
        </button>

        <!-- Botón para guardar -->
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Guardar Cambios
        </button>
    </form>
</div>

<script>
document.getElementById('agregar-color').addEventListener('click', function () {
    const container = document.getElementById('colores-container');
    const index = container.querySelectorAll('input[name^="colores"]').length / 2;
    const html = `
        <div class="mb-4" id="color-${index}">
            <input type="text" name="colores[${index}][nombre]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" placeholder="Nombre del color" required>
            <input type="file" name="colores[${index}][imagen]" class="w-full border-gray-300 rounded-lg shadow-sm">
            <button type="button" onclick="eliminarColor(${index})" class="mt-2 bg-[#A61B81] text-white px-2 py-1 rounded hover:bg-[#7503A6] transition">Eliminar</button>
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
});

function eliminarColor(index) {
    document.getElementById(`color-${index}`).remove();
}
</script>
@endsection
