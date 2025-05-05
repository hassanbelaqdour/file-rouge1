<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;

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

    Route::get('/AllCourses', function () {
        if (auth()->user()->role !== 'student') {
            abort(403, 'Accès non autorisé.');
        }
        return view('student.AllCourses');
    })->name('AllCourses');
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
    Route::get('admin/courses', [AdminController::class, 'gestionCourses'])->name('admin.GestionCourses');
    Route::post('admin/courses/{id}/accept', [AdminController::class, 'acceptCourse'])->name('admin.acceptCourse');
    Route::post('admin/courses/{id}/reject', [AdminController::class, 'rejectCourse'])->name('admin.rejectCourse');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/statistiques', [AdminController::class, 'statistiquesAdmin'])->name('admin.StatistiqueAdmin');
    Route::get('/admin/GestionCourses', [AdminController::class, 'gestionCourses'])->name('admin.GestionCourses');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/courses/{course}/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/payment/success/{course}', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel/{course}', [PaymentController::class, 'cancel'])->name('payment.cancel');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/statistiques', [TeacherController::class, 'statistiques'])->name('teacher.StatistiqueTeacher');
    Route::get('/teacher/courses', [TeacherController::class, 'courses'])->name('teacher.courses');
    Route::get('/teacher/students', [TeacherController::class, 'students'])->name('teacher.Students');
    Route::post('/teacher/courses', [TeacherController::class, 'storeCourse'])->name('teacher.courses.store');
    Route::resource('categories', CategoryController::class)->except(['show']);
});
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index'); 


Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store'); 



Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update'); 



Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');
    Route::get('/teacher/courses/{course}', [TeacherController::class, 'showCourse'])->name('teacher.courses.show');
    Route::get('/teacher/courses/{course}/edit', [TeacherController::class, 'edit'])->name('teacher.courses.edit');
    Route::put('/teacher/courses/{course}', [TeacherController::class, 'update'])->name('teacher.courses.update');
    Route::delete('/teacher/courses/{course}', [TeacherController::class, 'destroy'])->name('teacher.courses.destroy');


    Route::get('/AllCourses', [StudentController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [StudentController::class, 'showCourse'])->name('student.courses.show');

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');