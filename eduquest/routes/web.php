<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Ajoutez l'import si ce n'est pas déjà fait

Route::get('/', function () {
    return view('home');
})->name('home');