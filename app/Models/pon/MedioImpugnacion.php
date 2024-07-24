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
  
    protected $guarded = [
        'file__s_url_sentencia_doc'
        ,'file__s_url_sentencia_pdf'
        ,'file__s_url_infografia'];
    

    public $timestamps = false;

    public function ponencia(): HasOne
    {
        return $this->hasOne(Ponencia::class,'n_id_ponencia');
    }

}
