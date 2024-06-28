<?php

namespace App\Models\asuntos\asunto_resolucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuntoResolucion extends Model
{
    use HasFactory;
    protected $table = "fre_resolucion";
    protected $primaryKey = ['n_id_resolucion', 'n_id_medio_impugnacion'];

    protected $fillable = [ 
        'n_id_medio_impugnacion',
        'd_fecha_resolucion',
        's_jel_desc_efectos',
        's_jel_desc_resumen',
        'b_deleted',
    ];
}
