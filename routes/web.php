<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');

});

// google login
Route::get('login/google',[LoginController::class, 'loginWithGoogle'])->name('login#google');
Route::get('login/google/callback',[LoginController::class, 'loginWithGoogleCallback']);

//github login
Route::get('login/github',[LoginController::class, 'loginWithGithub'])->name('login#github');
Route::get('login/github/callback',[LoginController::class, 'loginWithGithubCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
