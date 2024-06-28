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
        Schema::create('fre_votacion', function (Blueprint $table) {
            /* $table->id('n_id_votacion'); */
            $table->foreignId('n_id_resolucion')->references('n_id_resolucion')->on('fre_resolucion')->onDelete('cascade');
            $table->foreignId('n_id_magistrado')->references('n_id_magistrado')->on('cat_jel_magistrado')->onDelete('cascade');
            $table->boolean('b_ausente');
            /* $table->integer('n_voto'); */
            $table->foreignId('n_id_tipo_voto')->references('n_id_tipo_voto')->on('cat_jel_tipo_voto')->onDelete('cascade');
            $table->longText('s_descripcion');
            $table->boolean('b_deleted');
            $table->primary(['n_id_resolucion', 'n_id_magistrado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fre_votacion');
    }
};
