<?php

namespace App\Http\Controllers\pom\log;

use App\Models\pon\log\PonMedioImpugnacionLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PonMedioImpugnacionLogController extends ApiController
{
    protected $db_model = AutoridadResponsable::class;
}
