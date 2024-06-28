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
        Schema::create('cat_jel_tipo_voto', function (Blueprint $table) {
            $table->id('n_id_tipo_voto');
            $table->string('s_nombre', 50);
            $table->boolean('b_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_jel_tipo_voto');
    }
};
