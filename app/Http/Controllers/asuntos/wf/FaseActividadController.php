<?php

namespace App\Http\Controllers\asuntos\wf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\wf\FaseActividad;

class FaseActividadController extends ApiController
{
    protected $db_model = FaseActividad::class;
}
