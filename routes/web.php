<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SmartBinController;

// Halaman Home
Route::get('/', function () {
    return view('home');
});

// Rute untuk Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Rute untuk mengaktifkan sensor
Route::match(['get', 'post'], '/activate-sensor', [SmartBinController::class, 'activateSensor'])
    ->name('activateSensor')
    ->middleware('auth');

// Rute logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
