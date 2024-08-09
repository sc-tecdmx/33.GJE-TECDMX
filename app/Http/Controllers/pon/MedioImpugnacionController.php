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
        leftJoin('cat_ponencia', 'cat_ponencia.n_id_ponencia','=','pon_medio_impugnacion.n_id_ponencia_instructora')
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


    private function testar( $cadena) {
        $newText = "**testado***";
            $testado = preg_replace('/(\*\*?).*?(\*\*)/', '$1'.$newText.'$2', $cadena);
    }

    public function show( $id_record )
    {
        try {
            $all_records = MedioImpugnacion::
            where('n_id_medio_impugnacion', $id_record)
                ->leftJoin('cat_ponencia', 'cat_ponencia.n_id_ponencia','=','pon_medio_impugnacion.n_id_ponencia_instructora')
                ->leftJoin('cat_ponencia as cat_ponencia_returno', 'cat_ponencia.n_id_ponencia','=','pon_medio_impugnacion.n_id_ponencia_returno')
                ->leftJoin('cat_autoridad_responsable', 'cat_autoridad_responsable.n_id_autoridad_responsable','=','pon_medio_impugnacion.n_id_autoridad_responsable')
                ->leftJoin('cat_tipo_medio', 'cat_tipo_medio.n_id_tipo_medio','=','pon_medio_impugnacion.n_id_tipo_medio')
                ->first();

            $link = "<a href='some-dynamic-link'>Text to replace</a>";
            $all_records['s_acto_impugnado_testado'] = $this->testar($all_records->s_acto_impugnado);

            error_log("MedioImpugnacion.show");
            error_log( json_decode($all_records));
            return response()->json(
            [   'status' => "success",
                'message' => 'Solicitud exitosa',
                'data' => $all_records
            ], 200);

        } catch (QueryException $ex) {
            return response()->json([
                'status' => "Error",
                'mensaje' => 'Error al crear el Registro: ',
                'excepcion' => $ex->getMessage()
            ], 400);
        }
    }

    public function showByWhere(string $field, string $value)
    {
        error_log('::ApiController.showByWhere ----------' . $this->db_model) ;
        try {
           ////  $_db_model = $this->db_model::where( $field, $value )->get();
           $all_records = MedioImpugnacion::
                where( $field, $value )
                ->leftJoin('cat_ponencia', 'cat_ponencia.n_id_ponencia','=','pon_medio_impugnacion.n_id_ponencia_instructora')
                ->leftJoin('cat_autoridad_responsable', 'cat_autoridad_responsable.n_id_autoridad_responsable','=','pon_medio_impugnacion.n_id_autoridad_responsable')
                ->leftJoin('cat_tipo_medio', 'cat_tipo_medio.n_id_tipo_medio','=','pon_medio_impugnacion.n_id_tipo_medio')
                ->get();

                error_log("MedioImpugnacion.showByWhere");
                error_log( $all_records);
            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $all_records
                ], 200);

        } catch (QueryException $ex) {
            error_log ("ERR!  show ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al consultar el Registro: /' . $field . '/' .$value ,
                'exception' => $ex->getMessage()
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
