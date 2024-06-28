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
        Schema::create('aofi_medio_autoridad', function (Blueprint $table) {
            $table->foreignId('n_id_medio_impugnacion')->references('n_id_medio_impugnacion')->on('aofi_medio_impugnacion')->onDelete('cascade');
            $table->foreignId('n_id_autoridad')->references('n_id_autoridad')->on('cat_jel_autoridad')->onDelete('cascade');
            $table->boolean('b_deleted');
            $table->primary(['n_id_medio_impugnacion', 'n_id_autoridad']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aofi_medio_autoridad');
    }
};
