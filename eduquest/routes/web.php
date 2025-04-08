<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Ajoutez l'import si ce n'est pas déjà fait

Route::get('/', function () {
    return view('home');
})->name('home');
// ... (import et route '/')

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
});
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']); // <- Ajoutée
});
Route::middleware('guest')->group(function () {
    // ... routes register
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // <- Ajoutée
});
Route::middleware('guest')->group(function () {
    // ... routes register
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']); // <- Ajoutée
});
// ... (import, route '/', groupe guest)

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});