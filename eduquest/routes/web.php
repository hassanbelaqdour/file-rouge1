<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Assurez-vous que le chemin est correct

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route d'accueil (publique)
Route::get('/', function () {
    return view('home'); // Ou une autre vue d'accueil
})->name('home'); // Donner un nom est une bonne pratique

// --- Routes pour les INVITÉS (non connectés) ---
// Le middleware 'guest' redirige les utilisateurs déjà connectés (vers /dashboard par ex.)
Route::middleware('guest')->group(function () {

    // Afficher le formulaire d'inscription
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    // Traiter la soumission du formulaire d'inscription
    Route::post('/register', [AuthController::class, 'register']);

    // Afficher le formulaire de connexion
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Traiter la soumission du formulaire de connexion
    Route::post('/login', [AuthController::class, 'login']);

    // Vous pouvez ajouter ici les routes pour la réinitialisation de mot de passe si besoin
    // Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

}); // Fin du groupe 'guest'

// --- Routes pour les UTILISATEURS AUTHENTIFIÉS ---
// Le middleware 'auth' redirige les invités vers la page de connexion (route nommée 'login')
Route::middleware('auth')->group(function () {

    // Route pour la déconnexion
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Exemple : Route pour un tableau de bord
    Route::get('/MyCourses', function () {
        return view('student.MyCourses');
    })->name('MyCourses');

    // Ajoutez ici toutes les autres routes qui nécessitent que l'utilisateur soit connecté
    // Exemple :
    // Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

}); // Fin du groupe 'auth'