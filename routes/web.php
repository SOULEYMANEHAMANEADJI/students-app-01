<?php

use App\Http\Controllers\ClasseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Index route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('etudiant.index');

Route::middleware(['auth'])->group(function () {
    // Routes for Etudiant
    Route::get('etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');
    Route::post('etudiant/store', [EtudiantController::class, 'store'])->name('etudiant.store');
    Route::get('etudiant/read/{id}', [EtudiantController::class, 'read'])->name('etudiant.read');
    Route::get('etudiant/update/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::put('etudiant/update/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::delete('etudiant/delete/{id}', [EtudiantController::class, 'delete'])->name('etudiant.delete');

    // Routes for Classe
    Route::get('classe/create', [ClasseController::class, 'create'])->name('classe.create');
    Route::post('classe/store', [ClasseController::class, 'store'])->name('classe.store');
    Route::get('classe/read/{id}', [ClasseController::class, 'read'])->name('classe.read');
    Route::get('classe/update/{id}/edit', [ClasseController::class, 'edit'])->name('classe.edit');
    Route::put('classe/update/{id}', [ClasseController::class, 'update'])->name('classe.update');
    Route::delete('classe/delete/{id}', [ClasseController::class, 'delete'])->name('classe.delete');
    Route::get('classe', [ClasseController::class, 'index'])->name('classe.index');

});
