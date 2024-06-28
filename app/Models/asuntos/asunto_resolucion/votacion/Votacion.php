<?php

namespace App\Models\asuntos\asunto_resolucion\votacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
    use HasFactory;
    protected $table = "fre_votacion";
    protected $primaryKey = ['n_id_resolucion', 'n_id_magistrado'];

    protected $fillable = [ 
        'n_id_resolucion',
        'n_id_magistrado',
        'b_ausente',
        'n_id_tipo_voto',
        's_descripcion',
        'b_deleted',
    ];
}
