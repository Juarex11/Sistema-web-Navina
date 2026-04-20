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
        Schema::create('pregunta_frecuentes', function (Blueprint $table) {
            $table->id();
            $table->text('pregunta');           // Pregunta del cliente
            $table->text('respuesta');          // Respuesta del sistema
            $table->integer('orden')->default(0); // Orden de aparición
            $table->boolean('activo')->default(true); // Estado activo/inactivo
            $table->timestamps();              // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregunta_frecuentes');
    }
};
