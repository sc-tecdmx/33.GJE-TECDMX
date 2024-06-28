<?php

namespace App\Models\asuntos\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    use HasFactory;
    protected $table = "cat_jel_tipo_voto";
    protected $primaryKey = 'n_id_tipo_voto';

    protected $fillable = [ 
        's_nombre',
        'b_deleted',
    ];
}
