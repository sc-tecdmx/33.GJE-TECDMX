<?php

namespace App\Models\asuntos\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magistrados extends Model
{
    use HasFactory;
    protected $table = "cat_jel_magistrado";
    protected $primaryKey = 'n_id_magistrado';

    protected $fillable = [ 
        's_desc_magistrado',
        's_magistrado',
        'b_deleted',
    ];
}
