<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\pon\AcuerdosController;
use App\Http\Controllers\pon\MedioImpugnacionController;
use App\Http\Controllers\pon\MedioTematicaController;

use App\Http\Controllers\pon\cat\AutoridadResponsableController;
use App\Http\Controllers\pon\cat\PonenciaController;
use App\Http\Controllers\pon\cat\TematicaController;
use App\Http\Controllers\pon\cat\TipoAcuerdoController;
use App\Http\Controllers\pon\cat\TipoMedioController;





/* Cat */
use App\Http\Controllers\asuntos\cat\MediosController;
use App\Http\Controllers\asuntos\cat\TematicasController;
use App\Http\Controllers\asuntos\cat\MagistradosController;
use App\Http\Controllers\asuntos\cat\VotosController;
use App\Http\Controllers\asuntos\cat\ResolucionesController;
use App\Http\Controllers\asuntos\cat\AutoridadesController;

/* Sección 1 */
use App\Http\Controllers\asuntos\AsuntosController;

/* Sección 2 */
use App\Http\Controllers\asuntos\asunto_tematicas\AsuntoTematicasController;

/* Sección 3 */
use App\Http\Controllers\asuntos\asunto_resolucion\AsuntoResolucionController;
use App\Http\Controllers\asuntos\asunto_resolucion\votacion\VotacionController;

/* WF */
use App\Http\Controllers\asuntos\wf\FaseController;
use App\Http\Controllers\asuntos\wf\ActividadController;
use App\Http\Controllers\asuntos\wf\FaseActividadController;
use App\Http\Controllers\asuntos\wf\AsuntoFaseController;

Route::prefix('gje')->group(function () {
    Route::apiResource ('/medio'            , MedioImpugnacionController::class);
    Route::apiResource ('/medio-tematica'   , MedioTematicaController::class);
    Route::apiResource ('/acuerdos'         , AcuerdosController::class);

    Route::apiResource ('/cat/tipo-medio'         , TipoMedioController::class);
    Route::apiResource ('/cat/autoridad-responsable'         , AutoridadResponsableController::class);
    Route::apiResource ('/cat/ponencia'         , PonenciaController::class);
    Route::apiResource ('/cat/tematica'         , TematicaController::class);
    Route::apiResource ('/cat/tipo-acuerdo'         , TipoAcuerdoController::class);
});
