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
        Schema::create('prescripciones', function (Blueprint $table) {
            $table->id('ID_prescripcion');
            $table->unsignedBigInteger('ID_cliente')->constrained('clientes');
            $table->decimal('esfera_oi', 5, 2);
            $table->decimal('esfera_od', 5, 2);
            $table->decimal('cilindro_oi', 5, 2);
            $table->decimal('cilindro_od', 5, 2);
            $table->integer('eje_oi');
            $table->integer('eje_od');
            $table->text('adicionales')->nullable();
            $table->date('fecha_prescripcion');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescripciones');
    }
};
