<?php

namespace App\Models\pon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MedioImpugnacion extends Model
{
    use HasFactory;

    protected $table = 'pon_medio_impugnacion';
    protected $primaryKey = 'n_id_medio_impugnacion';
  
    protected $guarded = [];
    public $timestamps = false;

    public function ponencia(): HasOne
    {
        return $this->hasOne(Ponencia::class,'n_id_ponencia');
    }

}
