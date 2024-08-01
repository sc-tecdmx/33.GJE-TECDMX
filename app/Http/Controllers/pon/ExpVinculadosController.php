<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;

use App\Models\pon\ExpVinculados;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpVinculadosController extends ApiController
{
    protected $db_model = ExpVinculados::class;
    public function byIdMedio(string $id_medio){
        try {

            $all_records = ExpVinculados::where('n_id_medio_impugnacion', $id_medio)->get();
            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $all_records
                ], 200);

        } catch (QueryException $ex) {
            return response()->json([
                'status' => "Error",
                'message' => 'Error al obtener los registros. ',
                'exception' => $ex->getMessage()
            ], 400);
        }
    }
}
