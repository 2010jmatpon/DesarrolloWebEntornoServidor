<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 35);
            $table->string('apellidos', 35);
            $table->date('fecha_nacimiento');
            $table->char('telefono', 13)->nullable(false);
            $table->string('poblacion', 200);
            $table->char('dni', 9)->unique()->nullable(false);
            $table->string('email', 35)->unique();
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();

            //restricciones
            $table->foreign('curso_id')->references('id')->on('cursos')->restrictOnDelete()->restrictOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};