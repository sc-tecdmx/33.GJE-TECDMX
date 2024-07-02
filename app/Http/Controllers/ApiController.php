<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
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

            error_log ("index ::" .$ex->getMessage() );
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
        error_log('store :::: ' ) ;
        error_log(json_encode($request->all()));
        try {
            $_db_model = $this->db_model::create($request->all());
            /* $_db_model->save(); */
            return response()->json(
                [   'status' => "success",
                    'message' => 'Registro exitoso',
                    'data' => [$_db_model] 
                ], 200);
        } catch (QueryException $ex) {

            error_log ("store ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al crear el registro' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }

    public function show( $id_record )
    {
        try {
            $_db_model = $this->db_model::findOrFail( $id_record );
            return $_db_model ;
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
            $_db_model = $this->db_model::findOrFail( $id_record );
            $_db_model->update( $request->all() ) ;
            return response()->json([
                'status' => "success", 
                'data' => [ $_db_model ] ], 200);
        } catch (ModelNotFoundException $ex){
            error_log ("update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'mensaje' => "Registro no encontrado " . $id_record,
                'excepcion' => $ex->getMessage()
            ], 400);
        } catch (QueryException $ex) {
            error_log ("update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'mensaje' => 'Error al actualizar el item ' . $id_record ,
                'excepcion' => $ex->getMessage()
            ], 400);
        } catch (Exception $ex) {
            error_log ("update ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'mensaje' => 'Error general ' ,
                'excepcion' => $ex->getMessage()
            ], 400);
        }
    }

    public function destroy($id_record)
    {
        
        try {
            $_db_model = $this->db_model::findOrFail($id_record);
            $_db_model->delete();
            return response()->json(['status' => "success", 'data' => [$_db_model ] ], 200);
        } catch (ModelNotFoundException $ex){
            error_log ("destroy ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'mensaje' => "Registro no encontrado " . $id_record,
                'excepcion' => $ex->getMessage()
            ], 404);
        } catch (QueryException $ex) {
            return response()->json([
                'status' => "Error",
                'mensaje' => 'Error al eliminar el registro ' ,
                'excepcion' => $ex->getMessage()
            ], 404);
        }
    }
}
