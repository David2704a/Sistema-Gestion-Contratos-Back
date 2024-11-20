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
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('primer_nombre')->nullable()->defaulValue('No Aplica');
            $table->string('segundo_nombre')->nullable()->defaulValue('No Aplica');
            $table->string('primer_apellido')->nullable()->defaulValue('No Aplica');
            $table->string('segundo_apellido')->nullable()->defaulValue('No Aplica');
            $table->string('identificacion');
            $table->string('fecha_nacimiento');
            $table->string('numero_telefono');
            $table->unsignedInteger('id_sede');
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
