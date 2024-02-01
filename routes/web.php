<?php

//-----> Dependencies 
use Illuminate\Support\Facades\Route;

//-----> Controllers
use App\Http\Controllers\WebController;


/*************************************************************/
/******************** ROUTES *********************************/
/*************************************************************/

/*
 El formato de las rutas son las siguientes:

    Route:<get|post|put|delete>('/ruta', [Nombre-de-clase::class, 'metodo'])

esto evita tener que colocar las funciones de lo que se debe hacer dentro de la misma carpeta
de las rutas. 
La carpeta de controladores se encuentra en la siguiente direccion:
    app/Https/Controllers/*

 
el metodo name le da un nombre representativo a la ruta. ejemplo:
    Suponiendo que queremos redireccionar con una etiqueta <a> de una ruta a otra,
    en vez de poner href="/equipos", colocamos lo siguiente (obviamente con los metodos de blade php):
    href="{{ route('equipments') }}" // suponiendo que ese es el nombre asignado
*/

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
