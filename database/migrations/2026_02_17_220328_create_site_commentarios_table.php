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
        Schema::create('site_commentarios', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->text('comentario');
            $table->tinyInteger('calificacion'); // 1 a 5 estrellas
            $table->date('fecha'); // Fecha del comentario
            $table->string('foto')->nullable(); // Foto del cliente (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_commentarios');
    }
};
