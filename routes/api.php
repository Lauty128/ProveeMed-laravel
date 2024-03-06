<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/proveedores/{id}/equipos', [ApiController::class, 'equipments_of_provider'])->name('api.equipments-of-provider');
Route::get('/equipos/{id}/proveedores', [ApiController::class, 'providers_of_equipment'])->name('api.providers-of-equipment');
// This endpoint returns the equipments that not has the indicated provider
Route::get('equipos/{id}/proveedores/buscar', [ApiController::class, 'equipments_that_not_has_a_provider'])->name("api.equipments-that-not-has-a-provider");