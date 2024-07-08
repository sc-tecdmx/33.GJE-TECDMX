<?php

namespace App\Models\pon\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    use HasFactory;

    protected $table = 'cat_tematica';
    protected $primaryKey = 'n_id_tematica';
  
    protected $guarded = [];
    public $timestamps = false;
}
