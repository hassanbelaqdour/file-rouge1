<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;

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


    Route::get('/teacher/StatistiqueTeacher', function () {
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Accès non autorisé.');
        }
        return view('teacher.StatistiqueTeacher');
    })->name('teacher.statistiqueTeacher');

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
    Route::get('/admin/GestionCourses', [AdminController::class, 'gestionCourses'])->name('admin.GestionCourses');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/statistiques', [TeacherController::class, 'statistiques'])->name('teacher.StatistiqueTeacher');
    Route::get('/teacher/courses', [TeacherController::class, 'courses'])->name('teacher.courses');
    Route::get('/teacher/students', [TeacherController::class, 'students'])->name('teacher.Students');
});

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');