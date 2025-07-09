<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('login');
Route::get('/login', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class,'login'])->name('auth.login');

Route::middleware(['auth'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
});
