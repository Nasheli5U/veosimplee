<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Óptica') }}</title>
    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex flex-col">
            <div class="p-6 border-b">
                <h2 class="text-lg font-bold text-gray-700">Menú de Navegación</h2>
            </div>
            
            <!-- Sidebar Links -->
            <nav class="flex-1 mt-4">
                <ul class="space-y-2">
                    <!-- Productos -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="w-full px-4 py-2 flex justify-between items-center text-gray-700 hover:bg-gray-200 rounded transition duration-200">
                            <span>Productos</span>
                            <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul x-show="open" class="pl-8 mt-2 space-y-2 text-gray-600" style="display: none;">
                            <li><a href="{{ route('productos.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Todos los Productos</a></li>
                            <li><a href="{{ route('productos.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Agregar productos</a></li>
                        </ul>
                    </li>

                    <!-- Clientes -->
                    <li><a href="{{ route('clientes.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Clientes</a></li>

                    <!-- Ventas -->
                    <li><a href="{{ route('ventas.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Ventas</a></li>

                    <!-- Reportes -->
                    <li><a href="{{ route('reportes.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Reportes</a></li>

                    <!-- Configuración -->
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="w-full px-4 py-2 flex justify-between items-center text-gray-700 hover:bg-gray-200 rounded transition duration-200">
                            <span>Configuración</span>
                            <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul x-show="open" class="pl-8 mt-2 space-y-2 text-gray-600" style="display: none;">
                            <li><a href="{{ route('categorias.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Categorías</a></li>
                            <li><a href="{{ route('marcas.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Marcas</a></li>
                            <li><a href="{{ route('materiales.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Materiales</a></li>
                            <li><a href="{{ route('subcategorias.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">Subcategorías</a></li>
                        </ul>
                    </li>

                    <!-- Logout -->
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="mt-6">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-[#A61B81] text-white rounded hover:bg-[#7503A6] transition">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow-sm border-b">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-700 font-semibold text-lg">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-6">
                @yield('content') 
            </main>
        </div>
    </div>

    <!-- Include Alpine.js for the dropdown functionality -->
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>
