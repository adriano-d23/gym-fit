<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/usuários', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuários/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::get('/usuários/store', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuários/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuários/update', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::get('/usuários/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');


require __DIR__.'/auth.php';
