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
    Route::get('/proveedores', [WebController::class, 'get_providers'])->name('providers');
    Route::get('/equipos', [WebController::class, 'get_equipments'])->name('equipments');
    Route::get('/proveedores/{id}', [WebController::class, 'get_provider'])->name('provider');
    Route::get('/equipos/{id}', [WebController::class, 'get_equipment'])->name('equipment');
    Route::get('/backups', [WebController::class, 'get_backups'])->name('backups');
    Route::get('/backups/{date}', [WebController::class, 'download_backup'])->name('backup');
//=====> POST

//=====> PUT
    Route::post('/backups', [WebController::class, 'add_backup']);
    Route::get('/', [WebController::class, 'home']);
//=====> DELTE
    Route::delete('/backups/{date}', [WebController::class, 'delete_backup']);
