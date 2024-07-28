<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\pon\DocExpedienteController;
class FileController extends Controller
{



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
      private function saveDocExpediente(Request $request){

        $docExpediente = new DocExpedienteController();
        $docExpediente->store($request);
    }

    public function uploadB64( $json_obj ){
        error_log( "-- uploadB64---" );
        $decoded_json = json_decode($json_obj ) ;

        try {
            $obj = json_decode($json_obj);
            error_log( "-- uploadB64--1-" );
            $s_path_repositorio     = $obj->s_path_repositorio;
            $s_file_repositorio     = $obj->s_file_repositorio;
            error_log( "-- uploadB64--2-" );
            $content                = base64_decode($obj->file_base64);
            $destino = env('GJE_PATH_SENTENCIAS', '/gje') . $s_path_repositorio  .'/' .$s_file_repositorio;
            error_log( "-- uploadB64--3-" . $destino  . "]");
            $path = Storage::disk('s3')->put( $destino, $content);
            error_log( "-- uploadB64--4-["  . $path . "]");
            $url = Storage::url($path);
          //  $resultdb = $this->saveDocExpediente($obj);
          //  error_log( $resultdb ) ;
            error_log( "-- uploadB64---" . $s_file_repositorio - " success ." );
            return response()->json(
                [   'status' => "success",
                    'message' => 'Archivo guardado:' . $destino ,
                    'data' => $path
                ], 200);

        } catch (Exception $ex) {
            error_log ("ERR! index ::" .$ex->getMessage() );
            return response()->json([
                'status' => "Error",
                'message' => 'Error [uploadB64] al cargar el archivo.' ,
                'exception' => $ex->getMessage()
            ], 400);
        }
        error_log('FileController 1- uploadB64 -okok-' ) ;
    }
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

    public function enviarSentencia(Request $request)
    {

        error_log('FileController:enviarSentencia: '  ) ;
        try {
                error_log( $request->hasFile('file') ) ;
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    
                    $filename = $file->getClientOriginalName();
                    //-- TODO. Perfeccionar el almacenado del archivo
                    $path = $file->storeAs( env('GJE_PATH_SENTENCIAS', 'sala/sentencia/2024/jel')  .'/gje/2024/', $filename);
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

    public function enviarSentenciaOk(Request $request)
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
            // $path =  storage_path("repositorio/{$file}");
         //   $contents = Storage::get("repositorio/{$file}");

         //   error_log ( "repositorio/{$file}");
           // return response()->download($path,  $file);
           //return Storage::download("repositorio/{$file}", $file, $headers);
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

    public function getSentenciaOk(string $file)
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