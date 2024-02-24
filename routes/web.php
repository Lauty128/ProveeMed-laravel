<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//-----> Controllers
use App\Http\Controllers\WebController;
use App\Http\Controllers\DashboardController;


/*************************************************************/
/******************** PUBLIC *********************************/
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

    
/*************************************************************/
/******************** DASHBOARD *********************************/
/*************************************************************/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/providers', [DashboardController::class, 'providers_list'])->name('dashboard.providers');
    Route::get('/dashboard/equipments', [DashboardController::class, 'equipments_list'])->name('dashboard.equipments');
});

require __DIR__.'/auth.php';
