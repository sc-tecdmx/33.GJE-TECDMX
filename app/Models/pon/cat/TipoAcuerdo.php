<?php

namespace App\Models\pon\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAcuerdo extends Model
{
    use HasFactory;
    protected $table = 'cat_tipo_acuerdo';
    protected $primaryKey = 'n_id_tipo_acuerdo';
  
    protected $guarded = [];
    public $timestamps = false;
}
