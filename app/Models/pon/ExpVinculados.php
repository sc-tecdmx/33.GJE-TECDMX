<?php

namespace App\Models\pon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpVinculados extends Model
{
    use HasFactory;

    protected $table = 'pom_exp_vinculados';
    protected $primaryKey = 'n_id_exp_vinculado';
  
    protected $guarded = [];
    public $timestamps = false;

}
