<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\pon\DocExpedienteController;
class FileController extends Controller
{

    private function saveDocExpediente(Request $request){

        $docExpediente = new DocExpedienteController();
        $docExpediente->store($request);
    }

    /**
     * TODO. Hacer la versión para subir archivos en Base64
     */


     /**
      * Version: FormData 
      *     file
      *     n_id_medio_impugnacion  1
      *     s_expediente            TEDF-JEL-001089/2013
      *     s_tipo_documento        sentencia
      *     s_path_repositorio      /gje/2024
      *     s_file_repositorio      archivo4.pdf
      *     d_doc_fecha_hora        2024-07-01 10:40
      */
    public function upload(Request $request)
    {

        error_log('FileController:upload: '  ) ;
        try {
                error_log( $request->hasFile('file') ) ;
                if ($request->hasFile('file') ) {
                    $file = $request->file('file');
                    
                    $s_path_repositorio = $request->input('s_path_repositorio');
                    $s_file_repositorio= $request->input('s_file_repositorio');
                    $filename = $file->getClientOriginalName();
                    //-- TODO. Perfeccionar el almacenado del archivo
                    error_log( 'GJE_PATH_SENTENCIAS['  . env('GJE_PATH_SENTENCIAS','*') .']' ) ;

                    $path = $file->storeAs( env('GJE_PATH_SENTENCIAS', 'sala/sentencia/2024/gje') . $s_path_repositorio , $s_file_repositorio);
                    // $path = $file->storePubliclyAs( 'storage' , $filename);
                    $url = Storage::url($path);
                    error_log( 'path:' . $path) ;
                    error_log( 'url:' . $url) ;
                    $resultdb = $this->saveDocExpediente($request);
                    error_log( $resultdb ) ;
                    /**/
                    return response()->json(
                        [   'status' => "success",
                            'message' => 'Archivo guardado',
                            'data' => $resultdb
                        ], 200);
                } else {
                    return response()->json([
                        'status' => "Error",
                        'message' => 'No envió el campo `file` con el archivo.' ,
                        'error' => $request
                    /*    'exception' => $ex->getMessage()*/
                    ], 400);
                }
            
        }  catch (Exception $ex) {

            error_log ("ERR! index ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al obtener los registros' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
    }


    public function getSentencia(string $file)
    {
        error_log('FileController:getSentencia: ' . $file  ) ;
        try {

           return Storage::disk('s3')->download("repositorio/{$file}", $file);

        } catch ( Exception  $ex) {
            error_log ("ERR!  getSentencia ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error al obtener la sentencia. ',
                'exception' => $ex->getMessage()
            ], 400);
        }
    }
}