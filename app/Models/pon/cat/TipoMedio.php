<?php

namespace App\Models\pon\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMedio extends Model
{
    use HasFactory;

    protected $table = 'cat_tipo_medio';
    protected $primaryKey = 'n_id_tipo_medio';
  
    protected $guarded = [];
    public $timestamps = false;

}
