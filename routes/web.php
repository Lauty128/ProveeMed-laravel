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
    //----> Profile
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //----> Providers
    // GET
    Route::get('/dashboard/proveedores', [DashboardController::class, 'providers_list'])->name('dashboard.providers');
    Route::get('/dashboard/proveedores/{id}/editar', [DashboardController::class, 'provider_update_page'])->name('dashboard.providers.update--page');
    Route::get('/dashboard/proveedores/agregar', [DashboardController::class, 'provider_create_page'])->name('dashboard.providers.create--page');
    Route::get('/dashboard/proveedores/{id}/editar/ubicacion', [DashboardController::class, 'provider_location_update_page'])->name('dashboard.providers_location.update--page');
    // POST
    Route::post('/dashboard/proveedores/nuevo', [DashboardController::class, 'provider_create'])->name('dashboard.providers.create');
    // PUT
    Route::put('/dashboard/proveedores/{id}/editar', [DashboardController::class, 'provider_update'])->name('dashboard.providers.update');
    Route::put('/dashboard/proveedores/{id}/editar/ubicacion', [DashboardController::class, 'provider_location_update'])->name('dashboard.providers_location.update');
    // DELETE
    Route::delete('/dashboard/proveedores/{id}/eliminar', [DashboardController::class, 'delete_provider'])->name('dashboard.providers.delete');

    //----> Equipments
    // GET
    Route::get('/dashboard/equipos', [DashboardController::class, 'equipments_list'])->name('dashboard.equipments');
    Route::get('/dashboard/equipos/{id}/editar', [DashboardController::class, 'equipments_update_page'])->name('dashboard.equipments.update--page');
    Route::get('/dashboard/equipos/agregar', [DashboardController::class, 'equipments_create_page'])->name('dashboard.equipments.create--page');
    // POST
    Route::post('/dashboard/equipos/nuevo', [DashboardController::class, 'equipments_create'])->name('dashboard.equipments.create');
    // PUT
    Route::put('/dashboard/equipos/{id}/editar', [DashboardController::class, 'equipments_update'])->name('dashboard.equipments.update');
    // DELETE
    Route::delete('/dashboard/equipos/{id}/eliminar', [DashboardController::class, 'delete_equipment'])->name('dashboard.equipments.delete');

    //----> Categories
    // GET
    Route::get('/dashboard/categorias', [DashboardController::class, 'categories_list'])->name('dashboard.categories');
    Route::get('/dashboard/categorias/{id}/editar', [DashboardController::class, 'categories_update_page'])->name('dashboard.categories.update--page');
    Route::get('/dashboard/categorias/agregar', [DashboardController::class, 'categories_create_page'])->name('dashboard.categories.create--page');
    // POST
    Route::post('/dashboard/categorias/nuevo', [DashboardController::class, 'categories_create'])->name('dashboard.categories.create');
    // PUT
    Route::put('/dashboard/categorias/{id}/editar', [DashboardController::class, 'categories_update'])->name('dashboard.categories.update');
    // DELETE
    Route::delete('/dashboard/categorias/{id}/eliminar', [DashboardController::class, 'categories_delete'])->name('dashboard.categories.delete');
});

require __DIR__.'/auth.php';
