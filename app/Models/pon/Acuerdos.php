<?php

namespace App\Models\pon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasOne;

class Acuerdos extends Model
{
    use HasFactory;

    protected $table = 'pon_acuerdos';
    protected $primaryKey = 'n_id_acuerdo';
  
    protected $guarded = [];
    public $timestamps = false;

   

}
