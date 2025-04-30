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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id('id_seccion');
            $table->unsignedBigInteger('id_docente');
            
            $table->string('nombre');
            $table->string('nrc')->unique();
            $table->string('seccion');
            $table->timestamps();
        });
        
        Schema::table('secciones', function (Blueprint $table) {
            $table->foreign('id_docente')
                  ->references('id_docente')
                  ->on('docentes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccions');
    }
};
