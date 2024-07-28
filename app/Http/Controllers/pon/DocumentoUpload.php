<?php
namespace App\Http\Controllers\pon;
use \JsonSerializable;
class DocumentoUpload implements JsonSerializable {
    private  $s_tipo_documento ;
    private  $s_path_repositorio;
    private  $s_file_name;
    private  $file_base64;
    private $errores = [];

    public function __construct($s_tipo_documento, $s_formato, $s_path_repositorio, $s_file_name , $file_base64 )
    {
        $this->s_tipo_documento = $s_tipo_documento;    /* Sentencia, Acuerdo, 11, 12 */
        $this->s_formato = $s_formato;                  /* pdf, docx */
        $this->s_path_repositorio= $s_path_repositorio; /*  /gje/2024/sentencia,  /gje/2024/acuerdos */
        $this->s_file_name = $s_file_name;
        $this->file_base64 = $file_base64;
    }

    public function getTipoDocumento(){
        return $this->s_tipo_documento;
    }
    public function getFormato(){
        return $this->s_formato;
    }
    public function getPathRepositorio(){
        return $this->s_path_repositorio;
    }
    public function getFileName(){
        return $this->s_file_name;
    }
    public function getFileB64(){
        return $this->file_base64;
    }
    public function isComplete(){
        if ($this->IsNullOrEmptyString($this->s_tipo_documento)) array_push($this->errores, "s_tipo_documento");
        if ($this->IsNullOrEmptyString($this->s_formato)) array_push($this->errores, "s_formato");
        if ($this->IsNullOrEmptyString($this->s_path_repositorio)) array_push($this->errores, "s_path_repositorio");
        if ($this->IsNullOrEmptyString($this->s_file_name)) array_push($this->errores, "s_file_name");
        if ($this->IsNullOrEmptyString($this->file_base64)) array_push($this->errores, "file_base64");
        return count($this->errores) === 0;
    }

    public function getErrores() {
        return $this->errores;
    }
    public function jsonSerialize()
    {
        return [
            'documento' => [
                'tipo_documento' => $this->s_tipo_documento,
                'formato' => $this->s_formato,
                'pat_repositorio' => $this->s_path_repositorio,
                'file_name' => $this->s_file_name,
                'file_b64' => $this->file_base64,
            ]
        ];
    }
    private function IsNullOrEmptyString(string|null $str){
        return $str === null || trim($str) === '';
    }
}