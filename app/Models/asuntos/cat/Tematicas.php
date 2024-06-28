<?php

namespace App\Models\asuntos\cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tematicas extends Model
{
    use HasFactory;
    protected $table = "cat_jel_tematica";
    protected $primaryKey = 'n_id_tematica';

    protected $fillable = [ 
        's_nombre',
        'n_id_tematica',
        'b_deleted',
    ];
}
