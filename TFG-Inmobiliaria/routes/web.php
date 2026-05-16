<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard.index'));
});

Route::get('/login', [AuthController::class, 'form'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth')->group(function () {

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::resource('propiedades', PropiedadController::class)
        ->parameters(['propiedades' => 'propiedad']);

    Route::resource('incidencias', IncidenciaController::class)
        ->parameters(['incidencias' => 'incidencia']);

    // CRUD usuarios solo para administradores
    Route::get('/users/change-password', [UserController::class, 'showChangePasswordForm'])
        ->name('users.showChangePassword');
    Route::patch('/users/password', [UserController::class, 'changePassword'])
        ->name('users.changePassword');
    Route::resource('users', UserController::class)->except(['create','store']);

});