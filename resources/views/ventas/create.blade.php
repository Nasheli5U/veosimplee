@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Registrar Venta</h1>

    <form action="{{ route('ventas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Selección del cliente -->
        <div class="mb-4">
            <label for="ID_cliente" class="block text-gray-700 font-medium mb-2">Cliente</label>
            <select name="ID_cliente" id="ID_cliente" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->ID_cliente }}">{{ $cliente->nombre }} - {{ $cliente->dni }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selección de productos -->
        <div id="productos-container" class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Productos</label>
            <div class="producto mb-3">
                <select name="productos[0][ID_producto]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2 producto-select" data-precio="0" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                    <option value="{{ $producto->ID_producto }}" data-precio="{{ $producto->precio }}">
                        {{ $producto->nombre }} (S/ {{ number_format($producto->precio, 2) }})
                    </option>
                    @endforeach
                </select>
                <input type="number" name="productos[0][cantidad]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2 cantidad-input" placeholder="Cantidad" min="1" required>
                <input type="text" name="productos[0][adicionales]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" placeholder="Adicionales">
                <input type="number" name="productos[0][costo_adicional]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2 adicional-input" placeholder="Costo adicional" min="0" step="0.01">
            </div>
        </div>

        <!-- Botón para agregar más productos -->
        <button type="button" id="agregar-producto" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition mb-4">
            Agregar Producto
        </button>

        <!-- Descuento -->
        <div class="mb-4">
            <label for="descuento" class="block text-gray-700 font-medium mb-2">Descuento</label>
            <input type="number" name="descuento" id="descuento" class="w-full border-gray-300 rounded-lg shadow-sm descuento-input" placeholder="Descuento" min="0" step="0.01">
        </div>

        <!-- Monto total -->
        <div class="mb-4">
            <p class="text-gray-700 font-medium">Monto Total: <span id="monto-total" class="text-lg font-bold">S/ 0.00</span></p>
        </div>
        <div class="mb-4">
            <label for="estado" class="block text-gray-700 font-medium mb-2">Estado de la Venta</label>
            <select name="estado" id="estado" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#A61B81]" required>
                <option value="Pendiente" selected>Pendiente</option> <!-- Valor predeterminado -->
                <option value="Pagada">Pagada</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>

        <!-- Botón para guardar la venta -->
        <button type="submit" class="bg-[#A61B81] text-white px-4 py-2 rounded hover:bg-[#7503A6] transition">
            Guardar Venta
        </button>
    </form>
</div>

<script>
    function calcularMontoTotal() {
        let total = 0;

        // Calcular el subtotal de los productos
        document.querySelectorAll('.producto').forEach((producto, index) => {
            const select = producto.querySelector('.producto-select');
            const precio = parseFloat(select.options[select.selectedIndex]?.dataset?.precio || 0);
            const cantidad = parseFloat(producto.querySelector('.cantidad-input')?.value || 0);
            const adicional = parseFloat(producto.querySelector('.adicional-input')?.value || 0);

            total += (precio * cantidad) + adicional;
        });

        // Aplicar descuento
        const descuento = parseFloat(document.getElementById('descuento')?.value || 0);
        total -= descuento;

        // Actualizar el monto total en la interfaz
        document.getElementById('monto-total').textContent = `S/ ${total.toFixed(2)}`;
    }

    // Escuchar cambios en productos, cantidades, adicionales y descuento
    document.getElementById('productos-container').addEventListener('input', calcularMontoTotal);
    document.getElementById('descuento').addEventListener('input', calcularMontoTotal);

    // Botón para agregar más productos
    document.getElementById('agregar-producto').addEventListener('click', function () {
        const container = document.getElementById('productos-container');
        const index = container.getElementsByClassName('producto').length;
        const html = `
            <div class="producto mb-3">
                <select name="productos[${index}][ID_producto]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2 producto-select" data-precio="0" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                    <option value="{{ $producto->ID_producto }}" data-precio="{{ $producto->precio }}">
                        {{ $producto->nombre }} (S/ {{ number_format($producto->precio, 2) }})
                    </option>
                    @endforeach
                </select>
                <input type="number" name="productos[${index}][cantidad]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2 cantidad-input" placeholder="Cantidad" min="1" required>
                <input type="text" name="productos[${index}][adicionales]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2" placeholder="Adicionales">
                <input type="number" name="productos[${index}][costo_adicional]" class="w-full border-gray-300 rounded-lg shadow-sm mb-2 adicional-input" placeholder="Costo adicional" min="0" step="0.01">
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        calcularMontoTotal();
    });
</script>
@endsection
