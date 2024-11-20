<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrescripcionController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;



// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Dashboard protegido
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categorías
    Route::resource('categorias', CategoriaController::class)->except(['show']);

    // Marcas
    Route::resource('marcas', MarcaController::class)->except(['show']);

    // Materiales
    Route::resource('materiales', MaterialController::class)->except(['show']);

    // Subcategorías
    Route::resource('subcategorias', SubcategoriaController::class)->except(['show']);

    // Productos
    Route::resource('productos', ProductoController::class)->except(['show']);
    
    Route::resource('ventas', VentaController::class)->except(['edit', 'update']);

    // Clientes
   // Clientes
   Route::resource('clientes', ClienteController::class);

   // Prescripciones asociadas a clientes
   Route::get('prescripciones/create/{cliente}', [PrescripcionController::class, 'create'])->name('prescripciones.create');
   Route::post('prescripciones/store/{cliente}', [PrescripcionController::class, 'store'])->name('prescripciones.store');
   Route::get('prescripciones/{prescripcion}/edit', [PrescripcionController::class, 'edit'])->name('prescripciones.edit');
   Route::put('prescripciones/{prescripcion}', [PrescripcionController::class, 'update'])->name('prescripciones.update');
   Route::get('/prescripciones/{id_cliente}', [PrescripcionController::class, 'show'])->name('prescripciones.show');
   Route::delete('prescripciones/{prescripcion}', [PrescripcionController::class, 'destroy'])->name('prescripciones.destroy');


   Route::get('reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('reportes/ventas', [ReporteController::class, 'ventas'])->name('reportes.ventas');
    Route::get('reportes/inventario', [ReporteController::class, 'inventario'])->name('reportes.inventario');
    Route::get('reportes/clientes', [ReporteController::class, 'clientes'])->name('reportes.clientes');

});

// Rutas de autenticación generadas por Laravel Breeze
require __DIR__.'/auth.php';
