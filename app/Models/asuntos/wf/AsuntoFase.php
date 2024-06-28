<?php

namespace App\Models\asuntos\wf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuntoFase extends Model
{
    use HasFactory;
    protected $table = "bwf_medio_fase";
    protected $primaryKey = 'n_id_medio_fase';

    protected $fillable = [ 
        'n_id_fase',
        'n_id_medio_impugnacion',
        's_descripcion',
        'd_fecha_autorizacion',
        'b_autorizado',
        'b_deleted',
    ];
}
