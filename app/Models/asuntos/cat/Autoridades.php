<?php

namespace App\Models\asuntos\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridades extends Model
{
    use HasFactory;
    protected $table = "cat_jel_autoridad";
    protected $primaryKey = 'n_id_autoridad';

    protected $fillable = [ 
        's_nombre',
        'b_deleted',
    ];
}
