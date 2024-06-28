<?php

namespace App\Models\asuntos\wf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = "bwf_actividad";
    protected $fillable = [ 
        's_nombre',
        's_descripcion',
        'b_deleted',
    ];
}
