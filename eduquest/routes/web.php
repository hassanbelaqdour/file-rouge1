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