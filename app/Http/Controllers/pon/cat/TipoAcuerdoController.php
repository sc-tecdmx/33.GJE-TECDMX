<?php

namespace App\Http\Controllers\pon\cat;
use App\Http\Controllers\ApiController;
use App\Models\pon\cat\TipoAcuerdo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoAcuerdoController extends ApiController
{
    protected $db_model = TipoAcuerdo::class;

}
