<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;

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

Route::get("/",HomeController::class)->name("home");

Route::get('/dashboard',[VacanteController::class, "index"])->middleware(['auth', 'verified',"rol.reclutador"])->name('vacantes.index');

Route::get('/vacantes/create',[VacanteController::class, "create"])->middleware(['auth', 'verified'])->name('vacantes.create');

Route::get('/vacantes/{vacante}/edit',[VacanteController::class, "edit"])->middleware(['auth', 'verified'])->name('vacantes.edit');

Route::get('/vacantes/{vacante}',[VacanteController::class, "show"])->name('vacantes.show');

Route::delete('/vacantes/{vacante}',[VacanteController::class, "destroy"])->middleware(['auth', 'verified'])->name('vacantes.destroy');

Route::get("/candidatos/{vacante}",[CandidatosController::class, "index"])->name('candidatos.index');

//notificaciones

Route::get('/notificaciones',NotificationController::class)->middleware(["auth","verified","rol.reclutador"])->name('notificaciones');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
