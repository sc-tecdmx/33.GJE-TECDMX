<?php

namespace App\Http\Controllers\pon\cat;
use App\Http\Controllers\ApiController;
use App\Models\pon\cat\Tematica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TematicaController extends ApiController
{
    protected $db_model = Tematica::class;

}
