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
        Schema::create('bwf_fase_actividad', function (Blueprint $table) {
            $table->foreignId('n_id_actividad')->nullable()->references('n_id_actividad')->on('bwf_actividad')->onDelete('cascade');
            $table->foreignId('n_id_fase_actual')->nullable()->references('n_id_fase')->on('bwf_fase')->onDelete('cascade');
            $table->foreignId('n_id_fase_destino')->nullable()->references('n_id_fase')->on('bwf_fase')->onDelete('cascade');
            $table->boolean('b_deleted');
            $table->primary(['n_id_actividad', 'n_id_fase_actual','n_id_fase_destino']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bwf_fase_actividad');
    }
};
