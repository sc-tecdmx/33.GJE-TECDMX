<?php

namespace App\Http\Controllers\pon\cat;
use App\Http\Controllers\ApiController;
use App\Models\pon\cat\TipoAcuerdo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoAcuerdoController extends ApiController
{
    protected $db_model = TipoAcuerdo::class;

    public function byTipoAcuerdo(string $s_tipo){
        try {

            $all_records = TipoAcuerdo::where('s_tipo', $s_tipo)->get();
            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $all_records
                ], 200);

        } catch (QueryException $ex) {
            error_log ("ERR!  show ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al obtener los registros ',
                'exception' => $ex->getMessage()
            ], 400);
        }
    }
}
