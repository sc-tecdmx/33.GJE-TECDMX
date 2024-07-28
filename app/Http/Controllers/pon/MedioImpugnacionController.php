<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\MedioImpugnacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\pon\FileController;
class MedioImpugnacionController extends ApiController
{
    protected $db_model = MedioImpugnacion::class;

    private function upload(Request $request){

        error_log('-------> MedioImpugnacion:upload' .$request->input('s_url_infografia') . ' size ' . strlen($request->input('file__b64_s_url_infografia') . ']') );
        if (! $this->isStrVacio($request->input('file__b64_s_url_infografia') ) 
            && ! $this->isStrVacio($request->input('s_url_infografia')) ) {
                
            $response_pdf;
            $pdf = new DocumentoUpload(
                'infografia',
                'pdf' ,
                '/2024/infografia',
                $request->input('s_url_infografia'),
                $request->input('file__b64_s_url_infografia')
            );
            $file_upload = new FileController();
            $response_pdf = json_decode($file_upload->uploadB64( $pdf ), true);
            if ($response_pdf['status'] =='success') {
                $request["s_url_infografia"] =  $response_pdf['data']['url_public'];
            }
        }
        return $request;
    }

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

    public function update(Request $request, $id_record)
    {
        try {
            $request = $this->upload($request);

            return parent::update($request, $id_record);
        } catch (Exception $ex) {
            error_log ("ERR! MedioImpugnacion::Child update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error general ' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
        
    }
    public function store(Request $request)
    {
        error_log("---------| MedioImpugnacion store |--------- --[". $request->input('n_id_medio_impugnacion') . "]:[".$request->input('s_url_infografia'). "]--");
        try {
            $request = $this->upload($request);
            return parent::store($request);
        } catch (Exception $ex) {
            error_log ("ERR! MedioImpugnacion::child->store ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error MedioImpugnacion ' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }

}
