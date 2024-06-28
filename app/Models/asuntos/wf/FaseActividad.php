<?php

namespace App\Models\asuntos\wf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaseActividad extends Model
{
    use HasFactory;
    protected $table = "bwf_fase_actividad";
    /* protected $primaryKey = ['n_id_actividad', 'n_id_fase_actual','n_id_fase_destino']; */

    protected $fillable = [ 
        'n_id_actividad',
        'n_id_fase_actual',
        'n_id_fase_destino',
        'b_deleted',
    ];
}
