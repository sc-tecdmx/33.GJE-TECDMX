<?php

namespace App\Http\Controllers\pon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\pon\DocExpedienteController;


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


class FileController extends Controller
{
    private $disk ;
    private $base_repositorio ;
    private $url_repositorio;

    public function __construct()
    {
        $this->disk             = env('FILESYSTEM_DISK', 'local');
        $this->base_repositorio = env('GJE_PATH_DOCUMENTOS', 'repositorio/tecdmx/gje');
        $this->url_repositorio  = env('URL_REPOSITORIO', 'https://repositorio.tecdmx.org.mx') . '/gje';
    }

    public function uploadB64( DocumentoUpload $doc ){
        error_log( "-- uploadB64 ---[" . $doc->getFileName() ."]");
        try {
            if ( $doc->isComplete() ) {

                $content_bin  = base64_decode($doc->getFileB64());
                $destino = $this->base_repositorio . $doc->getPathRepositorio() .'/' .$doc->getFileName();
                $hash = hash('sha256',$destino);
                $path = Storage::disk( $this->disk )->put( $destino, $content_bin);

                $response = [   'status' => "success",
                    'message' => 'Archivo guardado:[' . $destino . "]",
                    'data' => [
                        'path' => $destino,
                        'hash' => $hash,
                        'url_public'  =>  $this->url_repositorio . $doc->getPathRepositorio() .'/' . $doc->getFileName()
                    ]
                ];
                return json_encode($response);
            } else {
                return [
                    'status' => "Error",
                    'message' => 'Error [uploadB64] al enviar los parámetros del archivo [' . $doc->getFileName() . "]",
                    'exception' => 'DocumentoUpload incompleto.'
                ];
            }
        }catch (Exception $ex) {
            error_log ("ERR! FileController:uploadB64:" .$ex->getMessage() );
            return 
                [
                    'status' => "Error",
                    'message' => 'Error [uploadB64] al cargar el archivo [' . $doc->getFileName() . "]",
                    'exception' => $ex->getMessage()
                ];
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