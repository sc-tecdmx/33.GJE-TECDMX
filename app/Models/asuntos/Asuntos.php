<?php

namespace App\Models\asuntos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asuntos extends Model
{
    use HasFactory;
    protected $table = "aofi_medio_impugnacion";
    protected $primaryKey = 'n_id_medio_impugnacion';
    
    protected $fillable = [ 
        /* 1ra etapa */
        'd_fecha_recepcion',
        's_expediente', /* form1 */
        's_jel_parte_actora',
        's_jel_tipo_acto_impugnado',
        /* form1 */
        's_via_recepcion',
        's_unidad_territorial',
        's_demarcacion',
        'b_vinculado',
        'b_reencauzamiento',
        /**  extras*/
        's_tmp_hora_recepcion',
        's_tmp_ponencia_instructora',
        's_tmp_autoridad_responsable',
        's_tmp_tematica',
        's_tmp_efectos',
        's_numero_votos',
        's_tmp_instruccion',
        's_tmp_tipo_de_medio',
        's_tmp_resumen',
        /*  */
        'd_fecha_aviso',
        'n_id_tipomedio',
        's_jel_desc_acto_impugnado',
        's_jel_tercer_interesado',
        'd_fecha_recepcion_turno',
        "n_id_magistrado",

         /* 2da etapa -> INSTRUCCION (FT)*/
        'd_fecha_radicacion',
        'd_fecha_admision_cierre',
        's_jel_desc_acuerdos',
        'b_audiencias', /* form1 */

        /* 3ra etapa -> RESOLUCIÓN (FT) */
        'src_jel_sentencia',
        'n_avance',

        /* form1 */
        's_carga_responsable',
        'd_fecha_retorno_ponencia',
        'b_incidentes',
        'd_fecha_acuerdo_pleno',
        's_resolutivos',
        's_observaciones',
        's_estado',
        /*  */
        
        'b_deleted',
    ];
}
