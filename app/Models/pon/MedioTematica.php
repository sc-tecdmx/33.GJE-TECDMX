<?php

namespace App\Models\pon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedioTematica extends Model
{
    use HasFactory;
    protected $table = 'pon_medio_impugnacion_tematica';
    protected $primaryKey = 'n_id_medio_impugnacion_tematica';
  
    protected $guarded = [];
    public $timestamps = false;
}
