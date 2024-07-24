<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\Acuerdos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcuerdosController extends ApiController
{
    protected $db_model = Acuerdos::class;

    public function update(Request $request, $id_record)
    {
        error_log('Acuerdos::update--Child ' ) ;
        return parent::update($request, $id_record);
    }
    
}
