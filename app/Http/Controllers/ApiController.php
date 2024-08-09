<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Http\Request;
use App\Models\pon\log\PonMedioImpugnacionLog;

abstract class ApiController extends Controller
{
    /* Version 0.2 */
    protected $db_model;
    
    public function index()
    {
        error_log('::ApiController.index ----------' . $this->db_model ) ;
           try {
            $all_records = $this->db_model::all();
            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $all_records
                ], 200);
        } catch (QueryException $ex) {
            error_log ("ERR! index ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al obtener los registros' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $_db_model = $this->db_model::create($request->all());

            $this->logMedioImpugnacion(
                [
                    'n_id_medio_impugnacion' => $_db_model->n_id_medio_impugnacion,
                    's_email_autor' => $_db_model->s_email_autor,
                    's_publicacion' => $_db_model->s_publicacion
                ]
            );

            error_log( json_encode($request->all() ) ) ;
            error_log( json_encode( $request->n_id_medio_impugnacion  ) ) ;

            $this->logMedioImpugnacion(
                [
                    'n_id_medio_impugnacion' => $request->n_id_medio_impugnacion,
                    's_email_autor'          => $request->s_email_autor,
                    's_publicacion'          => $request->s_publicacion
                ]
            );
            
            return response()->json(
                [   'status' => "success",
                    'message' => 'Registro exitoso',
                    'data' => $_db_model
                ], 200);
        } catch (QueryException $ex) {

            error_log ("ERR! store ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al crear el registro' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }
    /**
     * {{api-asuntos}}/api/gje/medio/s_email_autor/isai.fararoni@tecdmx.org.mx
     * {{api-asuntos}}/api/gje/medio/s_publicacion/Publicar
     */
    public function showByWhere(string $field, string $value)
    {
        error_log('::ApiController.showByWhere ----------' . $this->db_model) ;
        try {
            $_db_model = $this->db_model::where( $field, $value )->get();

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

    public function show( $id_record )
    {
        error_log('::ApiController.show ---------- '. $this->db_model .'[' . $id_record . ']' ) ;
        try {
            $_db_model = $this->db_model::findOrFail( $id_record );
            return response()->json(
                [   'status' => "success",
                    'message' => 'Solicitud exitosa',
                    'data' => $_db_model
                ], 200);

        } catch (QueryException $ex) {
            error_log ("ERR!  show ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al crear el Registro: ',
                'exception' => $ex->getMessage()
            ], 400);
        }
    }


    public function update(Request $request, $id_record)
    {
        
        error_log('::ApiController.update ----------'. $this->db_model .'[' . $id_record . ']' ) ;
        try {
            $_db_model = $this->db_model::findOrFail( $id_record );
            $_db_model->update( $request->all() ) ;

            error_log( json_encode($request->all() ) ) ;
            error_log( json_encode( $request->n_id_medio_impugnacion  ) ) ;

            $this->logMedioImpugnacion(
                [
                    'n_id_medio_impugnacion' => $request->n_id_medio_impugnacion,
                    's_email_autor'          => $request->s_email_autor,
                    's_publicacion'          => $request->s_publicacion
                ]
            );

            return response()->json([
                'status' => "success", 
                'message' => 'Actualización exitosa',
                'data' => $_db_model  
            ], 200);
        } catch (ModelNotFoundException $ex){
            error_log ("ERR! 1 update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => "Registro no encontrado " . $id_record,
                'exception' => $ex->getMessage()
            ], 400);
        } catch (QueryException $ex) {
            error_log ("ERR! 2 update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al actualizar el item ' . $id_record ,
                'exception' => $ex->getMessage()
            ], 400);
        } catch (Exception $ex) {
            error_log ( $ex );
            error_log ("ERR! 3 update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error general ' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }

    public function destroy($id_record)
    {
        try {
            $_db_model = $this->db_model::findOrFail($id_record);
            // TODO. Borrado lógico
            $_db_model->delete();
            return response()->json(['status' => "success", 'data' => $_db_model ], 200);
        } catch (ModelNotFoundException $ex){
            error_log ("ERR! 1 destroy ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => "Registro no encontrado " . $id_record,
                'exception' => $ex->getMessage()
            ], 404);
        } catch (QueryException $ex) {
            error_log ("ERR! 2 destroy ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al eliminar el registro ' ,
                'exception' => $ex->getMessage()
            ], 404);
        }
    }

    public function isStrVacio( $str ){
        $resultado = ! ( $str !== null  && $str !==''  && strlen($str) > 0  );
        return  $resultado  ;
    }
    
    private function logMedioImpugnacion ($arr_fields) {
        error_log('-- logMedioImpugnacion -- ');
        error_log(json_encode($arr_fields) );
        error_log($arr_fields['n_id_medio_impugnacion']  );
        if (
             ! $this->isStrVacio( $arr_fields['n_id_medio_impugnacion'] ) &&
             ! $this->isStrVacio( $arr_fields['s_email_autor'] ) &&
             ! $this->isStrVacio( $arr_fields['s_publicacion'] ) 
        ) {
            $log = PonMedioImpugnacionLog::create([
                'n_id_medio_impugnacion' => $arr_fields['n_id_medio_impugnacion'],
                's_email_autor'          => $arr_fields['s_email_autor'],
                's_publicacion'          => $arr_fields['s_publicacion']
            ]);        
        }
        
    }
}