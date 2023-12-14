<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;

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

Route::get('/dashboard', function () {
    $musics = \App\Models\Music::all(); // Assuming your Music model is in the App\Models namespace
    return view('dashboard', compact('musics'));
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('admin')->group(function () {
    Route::resource('music', MusicController::class);
    Route::get('/music', [MusicController::class, 'index'])->name('music.index');
    

    Route::get('/music/create', [MusicController::class, 'create'])->name('music.create');
    // Edit Music
    Route::get('/music/{id}/edit', [MusicController::class, 'edit'])->name('music.edit');
    Route::put('/music/{id}', [MusicController::class, 'update'])->name('music.update');
    // Delete Music
    Route::delete('/music/{id}/destroy', [MusicController::class, 'destroy'])->name('music.destroy');
    Route::resource('music', MusicController::class);
    
 });

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/music/search', [MusicController::class, 'search'])->name('music.search');

});

require __DIR__.'/auth.php';
