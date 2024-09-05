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
        Schema::create('solicitud_visita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_persona'); // Asegúrate de usar el nombre correcto
            $table->unsignedBigInteger('id_propiedad'); // Asegúrate de usar el nombre correcto
            $table->date('fecha_visita');
            $table->text('comentario');
            $table->timestamps();
    
            // Definir las claves foráneas
            $table->foreign('id_persona')->references('id')->on('personas');
            $table->foreign('id_propiedad')->references('id')->on('propiedades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_visita');
    }
};
