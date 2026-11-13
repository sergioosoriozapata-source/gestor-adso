<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/aprendices');

Route::middleware(['auth'])->group(function () {
    Route::resource('aprendices', AprendizController::class)
        ->parameters(['aprendices' => 'aprendiz'])
        ->except(['show']);

    Route::get('/dashboard', [AprendizController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
