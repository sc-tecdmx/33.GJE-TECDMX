<?php

namespace App\Models\pon\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoridadResponsable extends Model
{
    use HasFactory;

    protected $table = 'cat_autoridad_responsable';
    protected $primaryKey = 'n_id_autoridad_responsable';
  
    protected $guarded = [];
    public $timestamps = false;

}
