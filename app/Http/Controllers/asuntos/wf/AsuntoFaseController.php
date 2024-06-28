<?php

namespace App\Http\Controllers\asuntos\wf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\wf\AsuntoFase;

class AsuntoFaseController extends ApiController
{
    protected $db_model = AsuntoFase::class;
}
