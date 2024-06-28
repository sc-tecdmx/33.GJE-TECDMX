<?php

namespace App\Models\asuntos\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medios extends Model
{
    use HasFactory;
    protected $table = "cat_jel_tipo_medio";
    protected $primaryKey = 'n_id_tipo_medio';

    protected $fillable = [ 
        /* 'cat_jel_tipo_medio', */
        's_desc_tipomedio',
        's_descripcion',
        'n_expediente',
        'b_deleted',
    ];
}
