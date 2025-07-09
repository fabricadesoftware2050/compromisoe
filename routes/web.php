<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
})->name('login');
Route::get('/login', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class,'login'])->name('auth.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
