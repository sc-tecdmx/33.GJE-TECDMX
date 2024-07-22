<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\DocExpediente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocExpedienteController extends ApiController
{
    protected $db_model = DocExpediente::class;
}
