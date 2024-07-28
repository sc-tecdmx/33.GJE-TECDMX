<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\ApiController;
use App\Models\pon\Acuerdos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\pon\FileController;

class AcuerdosController extends ApiController
{
    protected $db_model = Acuerdos::class;

    public function update(Request $request, $id_record)
    {
        try {
             /**
             *  Guardar los archivos adjuntos de acuerdos
            *     n_id_medio_impugnacion  1
            *     s_expediente            TEDF-JEL-001089/2013
            *     s_tipo_documento        sentencia
            *     s_path_repositorio      /gje/2024
            *     s_file_repositorio      archivo4.pdf
            *     d_doc_fecha_hora        2024-07-01 10:40
            */
            //-- 1.- s_url_sentencia_pdf
            error_log( "-- AcuerdosController---[" .  $request->input('s_url_sentencia_pdf') . "]--");
            $data = array (
                'n_id_medio_impugnacion' => $request->input('n_id_medio_impugnacion'),
                's_expediente' =>  $request->input('s_expediente'),
                's_tipo_documento' =>  $request->input('n_id_tipo_acuerdo'),
                's_path_repositorio' =>  '/gje/2024/sentencia',
                's_file_repositorio' =>  $request->input('s_url_sentencia_pdf'),
                'd_doc_fecha_hora' => date('Y-m-d G:i'),
                "file_base64" => $request->input('file__b64_s_url_sentencia_pdf'),
            );
            $file_upload = new FileController();
            $data_json = json_encode($data) ;
            $file_upload->uploadB64($data_json);

            //-- 2.- s_url_sentencia_docx
            $data = array (
                'n_id_medio_impugnacion' => $request->input('n_id_medio_impugnacion'),
                's_expediente' =>  $request->input('s_expediente'),
                's_tipo_documento' =>  $request->input('Sentencia'),
                's_path_repositorio' =>  '/gje/2024/sentencia',
                's_file_repositorio' =>  $request->input('s_url_sentencia_doc'),
                'd_doc_fecha_hora' => date('Y-m-d G:i'),
                "file_base64" => $request->input('file__b64_s_url_sentencia_doc'),
            );
            $file_upload = new FileController();
            $data_json = json_encode($data) ;
            $file_upload->uploadB64($data_json);

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
    
}
