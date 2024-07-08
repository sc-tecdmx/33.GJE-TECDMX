<?php

namespace App\Http\Controllers\pon\cat;
use App\Http\Controllers\ApiController;
use App\Models\pon\cat\AutoridadResponsable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoridadResponsableController extends ApiController
{
    protected $db_model = AutoridadResponsable::class;
}
