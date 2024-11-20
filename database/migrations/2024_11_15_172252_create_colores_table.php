<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colores', function (Blueprint $table) {
            $table->id('ID_color');
            $table->unsignedBigInteger('ID_producto')->constrained('productos')->onDelete('cascade');
            $table->string('nombre');
            $table->string('imagen')->nullable(); // Almacena la ruta de la imagen
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colores');
    }
};
