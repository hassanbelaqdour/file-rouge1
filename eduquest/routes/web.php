<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/admin/Users', [AdminController::class, 'showUsers'])->middleware(['auth'])->name('admin.Users');


    Route::get('/teacher/CreationCourse', function () {
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Accès non autorisé.');
        }
        return view('teacher.CreateCourse');
    })->name('teacher.createCourse');

    Route::get('/MyCourses', function () {
        if (auth()->user()->role !== 'student') {
            abort(403, 'Accès non autorisé.');
        }
        return view('student.MyCourses');
    })->name('MyCourses');
});

Route::middleware(['auth',])->group(function () {
    Route::get('/admin/users/pending', [AdminController::class, 'showPendingUsers'])->name('admin.pendingUsers');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/admin/users/{id}/approve', [AdminController::class, 'approveUser'])->name('admin.approveUser');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/admin/users/{id}/reject', [AdminController::class, 'rejectUser'])->name('admin.rejectUser');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/statistiques', [AdminController::class, 'statistiquesAdmin'])->name('admin.StatistiqueAdmin');
});

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');