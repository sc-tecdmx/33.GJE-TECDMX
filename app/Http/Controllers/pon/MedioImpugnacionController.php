<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\MedioImpugnacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedioImpugnacionController extends ApiController
{
    protected $db_model = MedioImpugnacion::class;
}
