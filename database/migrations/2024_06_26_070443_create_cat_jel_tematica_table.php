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
        Schema::create('cat_jel_tematica', function (Blueprint $table) {
            $table->id('n_id_tematica');
            $table->string('s_nombre', 50);
            $table->foreignId('n_id_tematica_padre')->nullable()->references('n_id_tematica')->on('cat_jel_tematica')->onDelete('cascade');
            $table->boolean('b_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_jel_tematica');
    }
};
