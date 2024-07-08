<?php

namespace App\Http\Controllers\pon\cat;
use App\Http\Controllers\ApiController;
use App\Models\pon\cat\Ponencia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PonenciaController extends ApiController
{
    protected $db_model = Ponencia::class;

}
