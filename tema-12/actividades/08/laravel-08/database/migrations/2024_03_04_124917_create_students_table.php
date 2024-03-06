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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35);
            $table->string('lastname', 35);
            $table->date('birth_date');
            $table->char('phone', 20)->nullable(false);
            $table->string('city', 200);
            $table->char('dni', 9)->unique()->nullable(false);
            $table->string('email', 35)->unique();
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            //restricciones
            $table->foreign('course_id')->references('id')->on('courses')->restrictOnDelete()->restrictOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};