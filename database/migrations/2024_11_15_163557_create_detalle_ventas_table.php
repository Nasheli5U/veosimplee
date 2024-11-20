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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('ID_detalle');
            $table->unsignedBigInteger('ID_venta')->constrained('ventas');
            $table->unsignedBigInteger('ID_producto')->constrained('productos');
            $table->text('adicionales')->nullable();
            $table->decimal('costo_adicional', 10, 2)->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
