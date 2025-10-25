<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\HomeController;
=======

>>>>>>> f54b2a5b0a23a4c927f083119117314db749d483


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    $usuario = Auth::user();
    return view('dashboard', compact('usuario'));
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
<<<<<<< HEAD
    
=======
>>>>>>> f54b2a5b0a23a4c927f083119117314db749d483
});

require __DIR__.'/auth.php';
