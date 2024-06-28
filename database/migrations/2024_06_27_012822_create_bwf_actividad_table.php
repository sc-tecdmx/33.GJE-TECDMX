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
        Schema::create('bwf_actividad', function (Blueprint $table) {
            $table->id('n_id_actividad');
            $table->string('s_nombre', 50);
            $table->longText('s_descripcion')->nullable();
            $table->boolean('b_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bwf_actividad');
    }
};
