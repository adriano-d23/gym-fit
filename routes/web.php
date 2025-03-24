<?php

use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::get('/usuários', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuários/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuários/store', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuários/edit/{id}', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuários/update/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::get('/usuários/destroy/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/establishment', [EstablishmentController::class, 'index'])->name('establishment.index');
Route::get('/establishment/create', [EstablishmentController::class, 'create'])->name('establishment.create');
Route::post('/establishment/store', [EstablishmentController::class, 'store'])->name('establishment.store');
Route::get('/establishment/edit/{id}', [EstablishmentController::class, 'edit'])->name('establishment.edit');
Route::put('/establishment/update/{id}', [EstablishmentController::class, 'update'])->name('establishment.update');
Route::get('/establishment/destroy/{id}', [EstablishmentController::class, 'destroy'])->name('establishment.destroy');



require __DIR__.'/auth.php';
