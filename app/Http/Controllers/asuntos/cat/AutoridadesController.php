<?php

namespace App\Http\Controllers\asuntos\cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\cat\Autoridades;

class AutoridadesController extends ApiController
{
    protected $db_model = Autoridades::class;
}
