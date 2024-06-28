<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route::controller(AsuntosController::class)->prefix("asuntos")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
    Route::post('update/{id_record}', 'update');
    Route::get('get_one/{id_record}', 'show');
    Route::get('delete/{id_record}', 'destroy');
    
});

Route::controller(MediosController::class)->prefix("cat/medios")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
    Route::post('update/{id_record}', 'update');
});

Route::controller(TematicasController::class)->prefix("cat/tematicas")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

Route::controller(MagistradosController::class)->prefix("cat/magistrados")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

Route::controller(VotosController::class)->prefix("cat/votos")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

Route::controller(ResolucionesController::class)->prefix("cat/resoluciones")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

Route::controller(AutoridadesController::class)->prefix("cat/autoridades")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

/* Sección 2 */
Route::controller(AsuntoTematicasController::class)->prefix("asunto/tematicas")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

/* Sección 3 */
Route::controller(AsuntoResolucionController::class)->prefix("asunto/resolucion")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

Route::controller(VotacionController::class)->prefix("asunto/resolucion/votacion")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

/* WF */
Route::controller(FaseController::class)->prefix("asunto/wf/fases")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});
Route::controller(ActividadController::class)->prefix("asunto/wf/actividades")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});
Route::controller(FaseActividadController::class)->prefix("asunto/wf/fases/actividades")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});
Route::controller(AsuntoFaseController::class)->prefix("asunto/wf/asunto/fase")->group(function () {
    Route::get('get_all', 'index');
    Route::post('create', 'store');
});

