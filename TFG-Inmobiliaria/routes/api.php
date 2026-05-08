<?php
use App\Http\Controllers\Api\IncidenciaController;
use App\Http\Controllers\Api\PropiedadController;
use Illuminate\Support\Facades\Route;


Route::as('api.')->group(function () {
    Route::apiResource("incidencias", IncidenciaController::class);
    Route::apiResource("propiedades", PropiedadController::class);
});

