<?php

namespace App\Http\Controllers\pon\cat;
use App\Http\Controllers\ApiController;
use App\Models\pon\cat\TipoMedio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoMedioController extends ApiController
{
    protected $db_model = TipoMedio::class;

}
