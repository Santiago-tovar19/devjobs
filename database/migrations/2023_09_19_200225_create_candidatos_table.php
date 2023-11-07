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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            //en la siguiente linea lo que hacemos es relacionar la tabla candidatos con la tabla users y vacantes y que al borrar un usuario se borren sus candidaturas y que al borrar una vacante se borren sus candidaturas
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vacante_id')->constrained()->onDelete('cascade');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
