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
        Schema::create('bwf_medio_fase', function (Blueprint $table) {
            $table->id('n_id_medio_fase');
            $table->foreignId('n_id_fase')->nullable()->references('n_id_fase')->on('bwf_fase')->onDelete('cascade');
            $table->foreignId('n_id_medio_impugnacion')->references('n_id_medio_impugnacion')->on('aofi_medio_impugnacion')->onDelete('cascade');
            $table->longText('s_descripcion');
            /* $table->date('d_fecha_modificacion'); */
            $table->date('d_fecha_autorizacion');
            $table->boolean('b_autorizado');
            $table->boolean('b_deleted');
            $table->primary(['n_id_medio_fase', 'n_id_fase']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bwf_medio_fase');
    }
};
