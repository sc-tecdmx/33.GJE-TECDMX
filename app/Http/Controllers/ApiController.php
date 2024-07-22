<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /* Version 0.1 */
    protected $db_model;
    
    public function index()
    {   try {
            $all_records = $this->db_model::all();
            //-- return ;
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
        //echo "store ---" 
        error_log('INFO store :::: ' ) ;
        error_log(json_encode($request->all()));
        try {
            $_db_model = $this->db_model::create($request->all());
            /* $_db_model->save(); */
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
        error_log('update :::: ' ) ;
        error_log(json_encode($request->all()));
        try {
            $_db_model = $this->db_model::findOrFail( $id_record );
            $_db_model->update( $request->all() ) ;
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
}
