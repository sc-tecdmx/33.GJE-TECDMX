<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\MedioImpugnacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedioImpugnacionController extends ApiController
{
    protected $db_model = MedioImpugnacion::class;
    public function index()
    {   try {
           
        $all_records = MedioImpugnacion::
        leftJoin('cat_ponencia', 'cat_ponencia.n_id_ponencia','=','pon_medio_impugnacion.n_id_autoridad_responsable')
            ->leftJoin('cat_autoridad_responsable', 'cat_autoridad_responsable.n_id_autoridad_responsable','=','pon_medio_impugnacion.n_id_autoridad_responsable')
            ->leftJoin('cat_tipo_medio', 'cat_tipo_medio.n_id_tipo_medio','=','pon_medio_impugnacion.n_id_tipo_medio')
            ->get();
            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $all_records
                ], 200);
        } catch (QueryException $ex) {

            error_log ("index ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al obtener los registros' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }


    public function show( $id_record )
    {
        try {
            /// $_db_model = $this->db_model::findOrFail( $id_record );
            $all_records = MedioImpugnacion::
            where('n_id_medio_impugnacion', $id_record)
            ->leftJoin('cat_ponencia', 'cat_ponencia.n_id_ponencia','=','pon_medio_impugnacion.n_id_autoridad_responsable')
          ->leftJoin('cat_autoridad_responsable', 'cat_autoridad_responsable.n_id_autoridad_responsable','=','pon_medio_impugnacion.n_id_autoridad_responsable')
          ->leftJoin('cat_tipo_medio', 'cat_tipo_medio.n_id_tipo_medio','=','pon_medio_impugnacion.n_id_tipo_medio')
          ->first();
          return response()->json(
            [   'status' => "success",
                'message' => 'Solicitud exitosa',
                'data' => $all_records
            ], 200);

           // return $_db_model ;
        } catch (QueryException $ex) {
            error_log ("show ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'mensaje' => 'Error al crear el Registro: ',
                'excepcion' => $ex->getMessage()
            ], 400);
        }
    }
}
