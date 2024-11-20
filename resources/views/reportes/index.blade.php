@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="color: #731259;">Reportes</h1>

    <div class="grid grid-cols-3 gap-4">
        <a href="{{ route('reportes.ventas') }}" class="bg-[#A61B81] text-white p-4 rounded shadow hover:bg-[#7503A6]">
            Reporte de Ventas
        </a>
        <a href="{{ route('reportes.inventario') }}" class="bg-[#731259] text-white p-4 rounded shadow hover:bg-[#63038C]">
            Reporte de Inventario
        </a>
        <a href="{{ route('reportes.clientes') }}" class="bg-[#7503A6] text-white p-4 rounded shadow hover:bg-[#A61B81]">
            Reporte de Clientes
        </a>
    </div>
</div>
@endsection
