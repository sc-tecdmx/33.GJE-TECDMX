<?php

namespace App\Models\pon\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponencia extends Model
{
    use HasFactory;

    protected $table = 'cat_ponencia';
    protected $primaryKey = 'n_id_ponencia';
  
    protected $guarded = [];
    public $timestamps = false;

}
