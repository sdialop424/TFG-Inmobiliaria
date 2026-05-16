<?php
use App\Http\Controllers\Api\IncidenciaController;
use App\Http\Controllers\Api\PropiedadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::as('api.')->group(function () {
        Route::get('incidencias', [IncidenciaController::class, 'index'])->middleware(['auth:sanctum']);
        Route::get("propiedades", [PropiedadController::class, 'index'])->middleware(['auth:sanctum']);
        Route::post('auth', [AuthController::class, 'login']);
    });
   

