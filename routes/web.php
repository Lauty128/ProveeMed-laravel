<?php

//-----> Dependencies 
use Illuminate\Support\Facades\Route;

//-----> Controllers
use App\Http\Controllers\WebController;


/*************************************************************/
/******************** ROUTES *********************************/
/*************************************************************/

//=====> GET
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::get('/proveedores', [WebController::class, 'providers'])->name('providers');
    Route::get('/equipos', [WebController::class, 'equipments'])->name('equipments');
    Route::get('/proveedores/{id}', [WebController::class, 'provider'])->name('provider');
    Route::get('/equipos/{id}', [WebController::class, 'equipment'])->name('equipment');
    Route::get('/backups', [WebController::class, 'backups_home'])->name('backups');
    Route::get('/backups/{date}', [WebController::class, 'download_backup'])->name('backup');
//=====> POST
    Route::post('/backups', [WebController::class, 'add_backup']);
//=====> PUT

//=====> DELTE
    Route::delete('/backups/{date}', [WebController::class, 'delete_backup']);
