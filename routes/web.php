<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sync', [MovieController::class, 'index'])->name('sync');
Route::get('/movies', [MovieController::class, 'create'])->name('movies');

require __DIR__.'/auth.php';
