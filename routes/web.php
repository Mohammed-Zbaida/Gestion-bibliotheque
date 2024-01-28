<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EmpruntController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');

Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');
Route::get('/livres/{livre}', [LivreController::class, 'show'])->name('livres.show');
Route::get('/livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('/livres/{livre}', [LivreController::class, 'update'])->name('livres.update');
Route::delete('/livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');
Route::get('/auteurs', [AuteurController::class, 'index'])->name('auteurs.index');

Route::get('/auteurs/create', [AuteurController::class, 'create'])->name('auteurs.create');
Route::post('/auteurs', [AuteurController::class, 'store'])->name('auteurs.store');
Route::get('/auteurs/{auteur}', [AuteurController::class, 'show'])->name('auteurs.show');
Route::get('/auteurs/{auteur}/edit', [AuteurController::class, 'edit'])->name('auteurs.edit');
Route::put('/auteurs/{auteur}', [AuteurController::class, 'update'])->name('auteurs.update');
Route::delete('/auteurs/{auteur}', [AuteurController::class, 'destroy'])->name('auteurs.destroy');


Route::get('/livres/{livre}/emprunts/create', [EmpruntController::class, 'create'])->name('emprunts.create');
Route::post('/livres/{livre}/emprunts', [EmpruntController::class, 'store'])->name('emprunts.store');
Route::get('/emprunts', [EmpruntController::class, 'index'])->name('emprunts.index');
Route::get('/emprunts/{emprunt}', [EmpruntController::class, 'show'])->name('emprunts.show');
Route::get('/emprunts/{emprunt}/edit', [EmpruntController::class, 'edit'])->name('emprunts.edit');
Route::put('/emprunts/{emprunt}', [EmpruntController::class, 'update'])->name('emprunts.update');
Route::delete('/emprunts/{emprunt}', [EmpruntController::class, 'destroy'])->name('emprunts.destroy');




Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();




