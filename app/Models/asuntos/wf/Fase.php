<?php

namespace App\Models\asuntos\wf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    use HasFactory;
    protected $table = "bwf_fase";
    protected $primaryKey = 'n_id_fase';

    protected $fillable = [ 
        's_nombre',
        's_descripcion',
        'b_deleted',
    ];
}
