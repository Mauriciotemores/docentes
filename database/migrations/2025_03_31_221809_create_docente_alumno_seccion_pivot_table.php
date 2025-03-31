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
        Schema::create('docente_alumno_seccion', function (Blueprint $table) {
            // No uses foreignId() directamente, ya que asume referencia a 'id'
            $table->unsignedBigInteger('id_docente');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_seccion');
            
            // Definir las claves foráneas explícitamente
            $table->foreign('id_docente')
                  ->references('id_docente')  // Asegúrate que coincida con la PK en docentes
                  ->on('docentes')
                  ->onDelete('cascade');
                  
            $table->foreign('id_alumno')
                  ->references('id_alumno')  // Asegúrate que coincida con la PK en alumnos
                  ->on('alumnos')
                  ->onDelete('cascade');
                  
            $table->foreign('id_seccion')
                  ->references('id_seccion')  // Asegúrate que coincida con la PK en secciones
                  ->on('secciones')
                  ->onDelete('cascade');
                  
            // Clave primaria compuesta
            $table->primary(['id_docente', 'id_alumno', 'id_seccion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_alumno_seccion');
    }
};
