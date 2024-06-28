<?php

namespace App\Http\Controllers\asuntos\asunto_resolucion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\asunto_resolucion\AsuntoResolucion;

class AsuntoResolucionController extends ApiController
{
    protected $db_model = AsuntoResolucion::class;
}
