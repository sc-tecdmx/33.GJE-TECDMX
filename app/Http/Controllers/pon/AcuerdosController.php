<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\Acuerdos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\pon\DocumentoUpload;
use App\Http\Controllers\pon\FileController;

class AcuerdosController extends ApiController
{
    protected $db_model = Acuerdos::class;
    private function upload(Request $request){
        
        if (! $this->isStrVacio($request->input('file__b64_s_url_sentencia_pdf') ) 
            && ! $this->isStrVacio($request->input('s_url_sentencia_pdf')) ) {
                error_log('-------> AcuerdosController:upload' .$request->input('s_url_sentencia_pdf') . ' size ' . strlen($request->input('file__b64_s_url_sentencia_pdf') . ']') );
            $response_pdf;
            $pdf = new DocumentoUpload(
                $request->input('n_id_tipo_acuerdo'),
                'pdf' ,
                '/2024/acuerdos',
                $request->input('s_url_sentencia_pdf'),
                $request->input('file__b64_s_url_sentencia_pdf')
            );
            $file_upload = new FileController();
            $response_pdf = json_decode($file_upload->uploadB64( $pdf ), true);
            if ($response_pdf['status'] =='success') {
                $request["s_url_sentencia_pdf"] =  $response_pdf['data']['url_public'];
            }
        }
        if (! $this->isStrVacio($request->input('file__b64_s_url_sentencia_doc') )
            && ! $this->isStrVacio($request->input('s_url_sentencia_doc'))) {
            error_log('-------> AcuerdosController:upload' .$request->input('s_url_sentencia_doc') . ' size ' . strlen($request->input('file__b64_s_url_sentencia_doc') . ']') );
            $response_doc;
            $doc = new DocumentoUpload(
                $request->input('n_id_tipo_acuerdo'),
                'doc' ,
                '/2024/acuerdos',
                $request->input('s_url_sentencia_doc'),
                $request->input('file__b64_s_url_sentencia_doc')
            );
            $file_upload = new FileController();
            $response_doc = json_decode($file_upload->uploadB64( $doc ), true);
            if ($response_doc['status'] =='success') {
                $request["s_url_sentencia_doc"] =  $response_pdf['data']['url_public'];
            }
        }
        return $request;
    }
    public function showByWhere(string $field, string $value)
    {
        error_log('::ApiController.showByWhere ----------' . $this->db_model) ;
        try {
            $_db_model = $this->db_model::orderBy('d_fecha_acuerdo', 'ASC')->where( $field, $value )->get();

            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $_db_model
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
        error_log("---------| Acuerdos update |--- --[" .$request->input('s_url_sentencia_pdf'). "]--");
        try {
            $request = $this->upload($request);
            return parent::update($request, $id_record);
        } catch (Exception $ex) {
            error_log ("ERR! Acuerdos::child-update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error Acuerdos ' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }
    public function store(Request $request)
    {
        error_log("---------| Acuerdos store |--------- --[". $request->input('n_id_medio_impugnacion') . "]:[".$request->input('s_url_sentencia_pdf'). "]--");
        try {
            $request = $this->upload($request);
            return parent::store($request);
        } catch (Exception $ex) {
            error_log ("ERR! Acuerdos::child->store ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error Acuerdos ' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }
}
