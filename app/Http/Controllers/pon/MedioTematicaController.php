<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\MedioTematica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedioTematicaController extends ApiController
{
    protected $db_model = MedioTematica::class;
}
