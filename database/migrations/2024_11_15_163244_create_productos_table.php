<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('ID_producto');
            $table->string('nombre');
            $table->unsignedBigInteger('ID_categoria'); // Clave foránea para la tabla categorias
            $table->unsignedBigInteger('ID_subcategoria');
            $table->unsignedBigInteger('ID_marca');
            $table->unsignedBigInteger('ID_material');
            $table->text('descripcion')->nullable();
            $table->string('codigo_producto')->unique();
            $table->integer('stock');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
