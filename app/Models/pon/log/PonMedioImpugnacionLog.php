<?php

namespace App\Models\pon\log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PonMedioImpugnacionLog extends Model
{
    use HasFactory;

    protected $table = 'pon_medio_impugnacion_log';
    protected $primaryKey = 'n_id_medio_impugnacion_log';

    protected $guarded = [];

}
