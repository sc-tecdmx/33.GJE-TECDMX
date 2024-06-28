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
        Schema::create('cat_jel_magistrado', function (Blueprint $table) {
            $table->id('n_id_magistrado');
            $table->string('s_desc_magistrado', 10);
            $table->string('s_magistrado', 100);
            $table->boolean('b_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_jel_magistrado');
    }
};
