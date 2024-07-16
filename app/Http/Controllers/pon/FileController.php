<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function enviarSentencia(Request $request)
    {

        error_log('FileController:enviarSentencia: '  ) ;
        try {
                error_log( $request->hasFile('file') ) ;
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    
                    $filename = $file->getClientOriginalName();
                    //-- TODO. Perfeccionar el almacenado del archivo
                    //-- TODO. Enviar a S3
                    $path = $file->storeAs( env('GJE_PATH_SENTENCIAS', 'uploads') , $filename);
                    // $path = $file->storePubliclyAs( 'storage' , $filename);
                    $url = Storage::url($path);
                    error_log( $path) ;
                    error_log( $url) ;
                    return response()->json(
                        [   'status' => "success",
                            'message' => 'Archivo guardado',
                            'data' => $filename
                        ], 200);
                } else {
                    return response()->json([
                        'status' => "Error",
                        'message' => 'No envió el campo `file` con el archivo.' 
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
            $path =  storage_path("app/uploads/{$file}");
            error_log ( $path);
            return response()->download($path,  $file);

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