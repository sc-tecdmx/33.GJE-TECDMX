<?php

namespace App\Http\Controllers\asuntos\asunto_resolucion\votacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\asunto_resolucion\votacion\Votacion;

class VotacionController extends ApiController
{
    protected $db_model = Votacion::class;
}
