<?php

namespace App\Http\Controllers\asuntos\wf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\wf\Fase;

class FaseController extends ApiController
{
    protected $db_model = Fase::class;
}
