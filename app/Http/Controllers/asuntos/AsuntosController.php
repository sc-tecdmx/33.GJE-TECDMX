<?php

namespace App\Http\Controllers\asuntos;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Models\asuntos\Asuntos;

class AsuntosController extends ApiController
{
    protected $db_model = Asuntos::class;
    

     /*public function store(Request $request){
        return response()->json(
            [   'status' => "success",
                'message' => 'Registro exitoso',
                'data' => [$request->src_jel_sentencia] 
            ], 200);
        try {
            $request->file('src_jel_sentencia')->store('public');
            $_db_model = $this->db_model::create($request->all());
            $_db_model->save();
            return response()->json(
                [   'status' => "success",
                    'message' => 'Registro exitoso',
                    'data' => [$this->$_db_model] 
                ], 200);
        } catch (QueryException $ex) {
            return response()->json([
                'status' => "error",
                'message' => 'Error al crear el registro' ,
                'exception' => $ex->getMessage()
            ], 404);
        } 
    }*/
    
    //Leer todas los asuntos
    /* public function index()
    {
        $asunto = Asuntos::all();
        $size_asunto = sizeof($asunto);
        $datos_asuntos = array();

        if ($size_asunto > 0) {

            for ($i = 0; $i < $size_asunto; $i++) {

                $arr_datos_asuntos = [
                    'id' => $asunto[$i]->id,
                    'd_fecha_recepcion' => $asunto[$i]->d_fecha_recepcion,
                    'd_fecha_aviso' => $asunto[$i]->d_fecha_aviso,
                    'n_id_tipomedio' => $asunto[$i]->n_id_tipomedio,
                    's_jel_tipo_acto_impugnado' => $asunto[$i]->s_jel_tipo_acto_impugnado,
                    's_jel_desc_acto_impugnado' => $asunto[$i]->s_jel_desc_acto_impugnado,
                    's_jel_parte_actora' => $asunto[$i]->s_jel_parte_actora,
                    's_jel_ad_or' => $asunto[$i]->s_jel_ad_or,
                    's_jel_tercer_interesado' => $asunto[$i]->s_jel_tercer_interesado,
                    'n_id_magistrado' => $asunto[$i]->n_id_magistrado,
                    'd_fecha_recepcion_turno' => $asunto[$i]->d_fecha_recepcion_turno,
                    'n_id_tematica' => $asunto[$i]->n_id_tematica,
                    'd_fecha_radicacion' => $asunto[$i]->d_fecha_radicacion,
                    'd_fecha_admision_cierre' => $asunto[$i]->d_fecha_admision_cierre,
                    's_jel_desc_acuerdos' => $asunto[$i]->s_jel_desc_acuerdos,
                    'd_fecha_resolucion' => $asunto[$i]->d_fecha_resolucion,
                    's_jel_desc_efectos' => $asunto[$i]->s_jel_desc_efectos,
                    'n_id_votos' => $asunto[$i]->n_id_votos, 
                    's_jel_desc_resumen' => $asunto[$i]->s_jel_desc_resumen,
                    's_jel_sentencia' => $asunto[$i]->s_jel_sentencia, 
                    'b_deleted' => $asunto[$i]->b_deleted,                  
                ];
                array_push($datos_asuntos, $arr_datos_asuntos);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Registros extraídos exitosamente.',
                'tamano' => $size_asunto,
                'datos_ingresos' => $datos_asuntos
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No existen registros.',
            ]);
        }
    } */
}
