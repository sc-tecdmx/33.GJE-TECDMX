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
        Schema::create('fre_resolucion_tipode', function (Blueprint $table) {
           $table->foreignId('n_id_resolucion')->references('n_id_resolucion')->on('fre_resolucion')->onDelete('cascade');
            $table->foreignId('n_id_tipo_resolucion')->references('n_id_tipo_resolucion')->on('cat_jel_tipo_resolucion')->onDelete('cascade');
            $table->boolean('b_deleted');
            $table->primary(['n_id_resolucion', 'n_id_tipo_resolucion']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fre_resolucion_tipode');
    }
};
