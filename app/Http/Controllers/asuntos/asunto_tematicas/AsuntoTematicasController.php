<?php

namespace App\Http\Controllers\asuntos\asunto_tematicas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\asunto_tematicas\AsuntoTematicas;

class AsuntoTematicasController extends ApiController
{
    protected $db_model = AsuntoTematicas::class;
}
