<?php

namespace App\Models\asuntos\asunto_tematicas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuntoTematicas extends Model
{
    use HasFactory;
    protected $table = "cpon_medio_tematica";
    /* protected $primaryKey = ['n_id_medio_impugnacion', 'n_id_tematica']; */

    protected $fillable = [ 
        'n_id_medio_impugnacion',
        'n_id_tematica',
        'b_deleted',
    ];
}
