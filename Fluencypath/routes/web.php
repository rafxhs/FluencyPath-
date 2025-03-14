<?php

use App\Models\Favorite;
use App\Models\Text;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FlashcardController;

// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $userTexts = $user->texts()->latest()->take(3)->get();
        $favoritedTexts = Text::whereHas('favorites')->latest()->take(3)->get();
        $texts = Text::latest()->take(3)->get();
        return view('dashboard', compact('favoritedTexts', 'userTexts', 'texts'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

    Route::get('/texts', [TextController::class, 'index'])->name('texts.index');
    Route::get('/texts/create', [TextController::class, 'create'])->name('texts.create');
    Route::post('/texts', [TextController::class, 'store'])->name('texts.store');
    Route::get('/texts/{id}', [TextController::class, 'show'])->name('texts.show');
    Route::delete('/texts/{id}', [TextController::class, 'destroy'])->name('texts.destroy');
    Route::get('/texts/{id}/edit', [TextController::class, 'edit'])->name('texts.edit');
    Route::put('/texts/{id}', [TextController::class, 'update'])->name('texts.update');


    Route::post('/texts/{id}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('texts.toggleFavorite');
    Route::get('/texts/{id}/favorites-count', [FavoriteController::class, 'getFavoritesCount'])->name('texts.getFavoritesCount');

    Route::post('/flashcards', [FlashcardController::class, 'store'])->name('flashcards.index');
    Route::get('/flashcards', [FlashcardController::class, 'index'])->name('flashcards.index');
    Route::delete('/flashcards/{id}', [FlashcardController::class, 'destroy'])->name('flashcards.destroy');
    Route::get('/word/{word}', [WordController::class, 'getWordData']);



});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


require __DIR__.'/auth.php';
