<?php
use App\Http\Controllers\Api\IncidenciaController;
use App\Http\Controllers\Api\PropiedadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/incidencias', [IncidenciaController::class, 'index']);
    Route::post('/incidencias', [IncidenciaController::class, 'store']);
    Route::get('/incidencias/{incidencia}', [IncidenciaController::class, 'show']);
    Route::put('/incidencias/{incidencia}', [IncidenciaController::class, 'update']);
    Route::delete('/incidencias/{incidencia}', [IncidenciaController::class, 'destroy']);

    Route::get('/propiedades', [PropiedadController::class, 'index']);
    Route::post('/propiedades', [PropiedadController::class, 'store']);
    Route::get('/propiedades/{propiedad}', [PropiedadController::class, 'show']);
    Route::put('/propiedades/{propiedad}', [PropiedadController::class, 'update']);
    Route::delete('/propiedades/{propiedad}', [PropiedadController::class, 'destroy']);
});