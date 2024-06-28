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
        Schema::create('fre_resolucion', function (Blueprint $table) {
            $table->bigIncrements('n_id_resolucion');
            $table->foreignId('n_id_medio_impugnacion')->references('n_id_medio_impugnacion')->on('aofi_medio_impugnacion')->onDelete('cascade');
            $table->date('d_fecha_resolucion');
            $table->longText('s_jel_desc_efectos');
            $table->longText('s_jel_desc_resumen');
            $table->primary(['n_id_resolucion', 'n_id_medio_impugnacion']);
            $table->boolean('b_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fre_resolucion');
    }
};
