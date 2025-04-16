<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Assurez-vous que le chemin est correct

// --- Contrôleurs pour les différentes sections (À CRÉER SI NON EXISTANTS) ---
// Vous devrez créer ces contrôleurs ou utiliser des closures comme ci-dessous
// use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// use App\Http\Controllers\Teacher\CourseController as TeacherCourseController;
// use App\Http\Controllers\Student\CourseController as StudentCourseController;


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
// Le middleware 'guest' redirige les utilisateurs déjà connectés
Route::middleware('guest')->group(function () {

    // Afficher le formulaire d'inscription
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    // Traiter la soumission du formulaire d'inscription
    Route::post('/register', [AuthController::class, 'register']);

    // Afficher le formulaire de connexion
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Traiter la soumission du formulaire de connexion
    Route::post('/login', [AuthController::class, 'login']);

    // Routes pour la réinitialisation de mot de passe (si nécessaire)
    // ...

}); // Fin du groupe 'guest'

// --- Routes pour les UTILISATEURS AUTHENTIFIÉS ---
// Le middleware 'auth' redirige les invités vers la page de connexion (route nommée 'login')
Route::middleware('auth')->group(function () {

    // Route pour la déconnexion (commune à tous les rôles)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- Routes spécifiques aux RÔLES ---
    // Ces routes sont accessibles car l'utilisateur est authentifié ('auth').
    // La redirection initiale est gérée dans AuthController, mais un utilisateur
    // pourrait essayer d'accéder à ces URL directement. Vous pourriez ajouter
    // un middleware de rôle ici si vous voulez une protection supplémentaire.

    // Route pour les ADMINISTRATEURS
    Route::get('/admin/StatistiqueAdmin', function () {
        // Vérification optionnelle mais recommandée du rôle ici ou via middleware dédié
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès non autorisé.'); // Ou rediriger ailleurs
        }
        return view('admin.StatistiqueAdmin'); // Assurez-vous que cette vue existe
    })->name('admin.stats'); // Nom utilisé dans AuthController

    // Route pour les ENSEIGNANTS
    Route::get('/teacher/CreationCourse', function () {
        // Vérification optionnelle du rôle
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Accès non autorisé.');
        }
        return view('teacher.CreateCourse'); // Assurez-vous que cette vue existe
    })->name('teacher.createCourse'); // Nom utilisé dans AuthController

    // Route pour les ÉTUDIANTS (existante, conservée)
    Route::get('/MyCourses', function () {
        // Vérification optionnelle du rôle
        if (auth()->user()->role !== 'student') {
            abort(403, 'Accès non autorisé.');
        }
        return view('student.MyCourses'); // Assurez-vous que cette vue existe
    })->name('MyCourses'); // Nom utilisé dans AuthController


    // Ajoutez ici d'autres routes nécessitant une authentification
    // Exemple : Profil utilisateur commun à tous les rôles connectés
    // Route::get('/profil', [UserProfileController::class, 'show'])->name('profile.show');
    // Route::post('/profil', [UserProfileController::class, 'update'])->name('profile.update');

}); // Fin du groupe 'auth'

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users/pending', [AdminController::class, 'showPendingUsers'])->name('admin.pendingUsers');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/users/{id}/approve', [AdminController::class, 'approveUser'])->name('admin.approveUser');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/users/{id}/reject', [AdminController::class, 'rejectUser'])->name('admin.rejectUser');
});

