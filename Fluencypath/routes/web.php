<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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



});

Route::get('/about', function () {
    return view('about.index');
})->name('about.index');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/word/{word}', function ($word) {
    //  Busca dados da palavra na DictionaryAPI
    $dictionaryResponse = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$word}");

    if ($dictionaryResponse->failed()) {
        return response()->json(['error' => 'Palavra não encontrada'], 404);
    }

    $dictionaryData = $dictionaryResponse->json();
    
    //  Obtém pronúncia e áudio (se disponível)
    $pronunciation = $dictionaryData[0]['phonetics'][0]['text'] ?? '';
    $audio = $dictionaryData[0]['phonetics'][0]['audio'] ?? '';

    //  Busca a tradução da palavra usando MyMemory API (inglês -> português)
    $translationResponse = Http::get("https://api.mymemory.translated.net/get", [
        'q' => $word,
        'langpair' => 'en|pt'
    ]);

    $translationData = $translationResponse->json();
    $translation = $translationData['responseData']['translatedText'] ?? 'Sem tradução';

    // Retorna os dados formatados
    return response()->json([
        'word' => $word,
        'pronunciation' => $pronunciation,
        'audio' => $audio,
        'translation' => $translation
    ]);
});

require __DIR__.'/auth.php';
