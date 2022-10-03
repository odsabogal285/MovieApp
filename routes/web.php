<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/index', [MovieController::class, 'create']);

require __DIR__.'/auth.php';
