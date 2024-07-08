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
        Schema::create('aofi_medio_impugnacion', function (Blueprint $table) {
            $table->id('n_id_medio_impugnacion');
            /* 1ra etapa */
            $table->date('d_fecha_recepcion');
            $table->string('s_expediente', 50)->nullable(); /* form1 */
            $table->string('s_jel_parte_actora', 150);
            $table->string('s_jel_autoridad_responsable', 150);
            $table->string('s_jel_tipo_acto_impugnado', 50);

            $table->string('s_jel_efectos', 450);
            $table->string('s_numero_votos', 450);
            $table->string('s_resumen', 450);
            
            
            /* form1 */
            $table->string('s_via_recepcion', 100)->nullable();
            $table->string('s_unidad_territorial', 100)->nullable();
            $table->string('s_demarcacion', 150)->nullable();
            $table->boolean('b_vinculado')->nullable();
            $table->boolean('b_reencauzamiento')->nullable();
            /*  */
            $table->date('d_fecha_aviso');
            $table->foreignId('n_id_tipomedio')->references('n_id_tipo_medio')->on('cat_jel_tipo_medio')->onDelete('cascade');
            $table->longText('s_jel_desc_acto_impugnado');
            $table->string('s_jel_tercer_interesado', 150);
            $table->date('d_fecha_recepcion_turno');
            $table->foreignId('n_id_magistrado')->nullable()->references('n_id_magistrado')->on('cat_jel_magistrado')->onDelete('cascade');
            $table->string('s_tmp_ponencia_instructora', 150);
            /*  */

            /* 2da etapa -> INSTRUCCION (FT)*/
            $table->date('d_fecha_radicacion')->nullable();
            $table->date('d_fecha_admision_cierre')->nullable();
            $table->longText('s_jel_desc_acuerdos')->nullable();
            $table->boolean('b_audiencias')->nullable(); /* form1 */
            /*  */

            /* 3ra etapa -> RESOLUCIÓN (FT) */
            $table->string('src_jel_sentencia', 256)->nullable();
            $table->integer('n_avance');
            
            /* form1 */
            $table->string('s_carga_responsable', 150)->nullable();
            $table->date('d_fecha_retorno_ponencia')->nullable();
            $table->boolean('b_incidentes')->nullable();
            $table->date('d_fecha_acuerdo_pleno')->nullable();
            $table->longText('s_resolutivos')->nullable();
            $table->longText('s_observaciones')->nullable();
            $table->string('s_estado', 150)->nullable();
            
            $table->boolean('b_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aofi_medio_impugnacion');
    }
};
