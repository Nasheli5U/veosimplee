@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Agregar Producto</h1>

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

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- Categoría -->
        <div class="mb-4">
            <label for="ID_categoria" class="block text-gray-700 font-medium mb-2">Categoría</label>
            <select name="ID_categoria" id="ID_categoria" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->ID_categoria }}" {{ old('ID_categoria') == $categoria->ID_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Subcategoría -->
        <div class="mb-4">
            <label for="ID_subcategoria" class="block text-gray-700 font-medium mb-2">Subcategoría</label>
            <select name="ID_subcategoria" id="ID_subcategoria" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                <option value="">Seleccione una subcategoría</option>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->ID_subcategoria }}" {{ old('ID_subcategoria') == $subcategoria->ID_subcategoria ? 'selected' : '' }}>
                        {{ $subcategoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Marca -->
        <div class="mb-4">
            <label for="ID_marca" class="block text-gray-700 font-medium mb-2">Marca</label>
            <select name="ID_marca" id="ID_marca" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                <option value="">Seleccione una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->ID_marca }}" {{ old('ID_marca') == $marca->ID_marca ? 'selected' : '' }}>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Material -->
        <div class="mb-4">
            <label for="ID_material" class="block text-gray-700 font-medium mb-2">Material</label>
            <select name="ID_material" id="ID_material" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
                <option value="">Seleccione un material</option>
                @foreach($materiales as $material)
                    <option value="{{ $material->ID_material }}" {{ old('ID_material') == $material->ID_material ? 'selected' : '' }}>
                        {{ $material->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" rows="4">{{ old('descripcion') }}</textarea>
        </div>

        <!-- Código del Producto -->
        <div class="mb-4">
            <label for="codigo_producto" class="block text-gray-700 font-medium mb-2">Código del Producto</label>
            <input type="text" name="codigo_producto" id="codigo_producto" value="{{ old('codigo_producto') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-medium mb-2">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" min="0" required>
        </div>

        <!-- Precio -->
        <div class="mb-4">
            <label for="precio" class="block text-gray-700 font-medium mb-2">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81] focus:border-[#A61B81]" required>
        </div>

        <!-- Colores -->
        <div id="colores-container" class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Colores</label>
            <div class="mb-4">
                <input type="text" name="colores[0][nombre]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" placeholder="Nombre del color" required>
                <input type="file" name="colores[0][imagen]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" accept="image/*" onchange="previewImage(this, 0)">
                <img id="preview-0" class="mt-2 w-20 h-20 object-cover rounded hidden">
            </div>
        </div>
        <button id="agregar-color" type="button" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition mb-4">
            Agregar Otro Color
        </button>

        <!-- Botón Guardar -->
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Guardar Producto
        </button>
    </form>
</div>

<script>
document.getElementById('agregar-color').addEventListener('click', function () {
    const container = document.getElementById('colores-container');
    const index = container.querySelectorAll('input[name^="colores"]').length / 2;
    const html = `
        <div class="mb-4">
            <input type="text" name="colores[${index}][nombre]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" placeholder="Nombre del color" required>
            <input type="file" name="colores[${index}][imagen]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" accept="image/*" onchange="previewImage(this, ${index})">
            <img id="preview-${index}" class="mt-2 w-20 h-20 object-cover rounded hidden">
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
});

function previewImage(input, index) {
    const preview = document.getElementById(`preview-${index}`);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
