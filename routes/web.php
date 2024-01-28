<?php

//-----> Dependencies 
use Illuminate\Support\Facades\Route;

//-----> Controllers
use App\Http\Controllers\WebController;


/*************************************************************/
/******************** ROUTES *********************************/
/*************************************************************/

//=====> GET
    Route::get('/', [WebController::class, 'home']);
    Route::get('/proveedores', [WebController::class, 'get_providers']);
    Route::get('/equipos', [WebController::class, 'get_equipments']);
    Route::get('/proveedores/{id}', [WebController::class, 'get_provider']);
    Route::get('/equipos/{id}', [WebController::class, 'get_equipment']);
//=====> POST

//=====> PUT
    
//=====> DELETE
