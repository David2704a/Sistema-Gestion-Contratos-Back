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
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id_contrato');
            $table->string('consecutivo');
            $table->string('estado_contrato');
            $table->string('fecha_inicio');
            $table->string('año');
            $table->string('fecha_fin');
            $table->string('valor');
            $table->string('observacion');
            $table->unsignedInteger('id_persona');
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->unsignedInteger('id_tipo_contrato');
            $table->foreign('id_tipo_contrato')->references('id_tipo_contrato')->on('tipos_contratos')->onDelete('cascade');
            $table->unsignedInteger('id_linea_negocio');
            $table->foreign('id_linea_negocio')->references('id_linea_negocio')->on('lineas_negocios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
