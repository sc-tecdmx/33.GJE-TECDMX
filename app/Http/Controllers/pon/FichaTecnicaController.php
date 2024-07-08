<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\FichaTecnica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class FichaTecnicaController extends ApiController
{
    protected $db_model = FichaTecnica::class;
}
