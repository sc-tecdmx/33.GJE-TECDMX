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
            /**
             *  Guardar los archivos adjuntos de acuerdos
            *     n_id_medio_impugnacion  1
            *     s_expediente            TEDF-JEL-001089/2013
            *     s_tipo_documento        sentencia
            *     s_path_repositorio      /gje/2024
            *     s_file_repositorio      archivo4.pdf
            *     d_doc_fecha_hora        2024-07-01 10:40
            */
/*            
            //-- 1.- s_url_sentencia_pdf
            $data = array (
                'n_id_medio_impugnacion' => $request->input('n_id_medio_impugnacion'),
                's_expediente' =>  $request->input('s_expediente'),
                's_tipo_documento' =>  $request->input('Sentencia'),
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
            //-- 3.- infografia
            $data = array (
                'n_id_medio_impugnacion' => $request->input('n_id_medio_impugnacion'),
                's_expediente' =>  $request->input('s_expediente'),
                's_tipo_documento' =>  $request->input('Sentencia'),
                's_path_repositorio' =>  '/gje/2024/sentencia',
                's_file_repositorio' =>  $request->input('s_url_infografia'),
                'd_doc_fecha_hora' => date('Y-m-d G:i'),
                "file_base64" => $request->input('file__b64_s_url_infografia'),
            );
            $file_upload = new FileController();
            $data_json = json_encode($data) ;
            $file_upload->uploadB64($data_json);

*/

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
