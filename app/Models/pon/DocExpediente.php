<?php

namespace App\Models\pon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocExpediente extends Model
{
    use HasFactory;

    protected $table = 'pon_doc_expediente';
    protected $primaryKey = 'n_id_doc_expediente';
  
    protected $guarded = ['file'];
    public $timestamps = false;


}
