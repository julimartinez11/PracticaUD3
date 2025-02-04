<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\RecursoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde se definen las rutas para la API. Estas rutas son
| cargadas por el RouteServiceProvider y tienen asignado el middleware "api".
|
*/

// Ruta de prueba para confirmar que se carga el archivo
Route::get('test', function () {
    return response()->json(['mensaje' => 'API funcionando']);
});

// Rutas de la API
Route::apiResource('eventos', EventoController::class);
Route::apiResource('actividades', ActividadController::class);
Route::apiResource('participantes', ParticipanteController::class);
Route::apiResource('recursos', RecursoController::class);
