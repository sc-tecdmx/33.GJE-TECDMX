<?php

namespace App\Models\asuntos\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resoluciones extends Model
{
    use HasFactory;
    protected $table = "cat_jel_tipo_resolucion";
    protected $primaryKey = 'n_id_tipo_resolucion';

    protected $fillable = [ 
        's_nombre',
        'b_deleted',
    ];
}
