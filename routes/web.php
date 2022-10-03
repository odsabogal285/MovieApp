<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sync', [MovieController::class, 'sync'])->name('sync');
Route::get('/movies', [MovieController::class, 'list'])->name('movies');
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movie');

require __DIR__.'/auth.php';
