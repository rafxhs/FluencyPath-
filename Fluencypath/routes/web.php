<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
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

    Route::get('/texts', [TextController::class, 'index'])->name('texts.index');
    Route::get('/texts/create', [TextController::class, 'create'])->name('texts.create');
    Route::post('/texts', [TextController::class, 'store'])->name('texts.store');
    Route::get('/texts/{id}', [TextController::class, 'show'])->name('texts.show');
    Route::delete('/texts/{id}', [TextController::class, 'destroy'])->name('texts.destroy');
    Route::get('/texts/{id}/edit', [TextController::class, 'edit'])->name('texts.edit');
    Route::put('/texts/{id}', [TextController::class, 'update'])->name('texts.update');
 

});

require __DIR__.'/auth.php';