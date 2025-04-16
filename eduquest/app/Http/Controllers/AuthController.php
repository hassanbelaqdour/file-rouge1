<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <- Très important !
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
// Ajoutez ceci si vous utilisez Log
// use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // ... showLoginForm() reste identique ...
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Gère la tentative de connexion.
     * Accessible uniquement aux invités.
     */
    public function login(Request $request): RedirectResponse
    {
        // --- Validation ---
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        // --- Préparation des identifiants pour Auth::attempt ---
        $credentials = $request->only('email', 'password');

        // --- AJOUT CRUCIAL : Condition pour le statut du compte ---
        $credentials['account_status'] = 'approved';

        // --- Tentative d'authentification via Laravel ---
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Authentification réussie ET compte approuvé !
            $request->session()->regenerate(); // Sécurité : Régénère l'ID de session

            // --- NOUVEAU : Redirection basée sur le rôle ---
            $user = Auth::user(); // Récupère l'utilisateur authentifié

            // Vérifie le rôle et redirige
            if ($user->role === 'admin') {
                // Redirige l'administrateur vers son tableau de bord
                return redirect()->intended(route('admin.stats')); // Assurez-vous que la route 'admin.stats' existe
            } elseif ($user->role === 'teacher') {
                // Redirige l'enseignant vers la page de création de cours (ou son tableau de bord)
                return redirect()->intended(route('teacher.createCourse')); // Assurez-vous que la route 'teacher.createCourse' existe
            } elseif ($user->role === 'student') {
                // Redirige l'étudiant vers ses cours
                return redirect()->intended(route('MyCourses')); // Route existante
            } else {
                // Fallback (au cas où le rôle serait inattendu ou null)
                // Vous pouvez déconnecter l'utilisateur, le rediriger vers une page par défaut, ou logger une erreur.
                // Option 1: Déconnexion et redirection vers login avec erreur
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')
                    ->withErrors(['email' => 'Rôle utilisateur non valide ou inconnu.'])
                    ->onlyInput('email');

                // Option 2: Redirection vers une page d'accueil générique (si elle existe)
                // return redirect()->intended(route('home'));
            }
            // --- FIN NOUVEAU ---

        }

        // --- Échec de l'authentification ---
        // (Soit email/mdp incorrect, soit compte non approuvé)
        return redirect()->route('login')
            ->withErrors(['email' => __('auth.failed')]) // Message générique incluant échec mdp OU statut non approuvé
            ->onlyInput('email', 'remember');
    }

    // ... showRegistrationForm() reste identique ...
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // ... register() reste identique ...
    public function register(Request $request): RedirectResponse
    {
        // --- Validation ---
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', Password::min(8)->letters()->numbers(), 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        // --- Création de l'utilisateur ---
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // Les valeurs par défaut pour 'role' ('student') et 'account_status' ('pending')
                // devraient être définies dans votre migration ou modèle User.
            ]);

            // --- Redirection après succès ---
            return redirect()->route('login')
                ->with('status', 'Compte créé avec succès ! Veuillez attendre son approbation par un administrateur.');

        } catch (\Exception $e) {
            // Log::error("Erreur d'enregistrement: " . $e->getMessage());
            return redirect()->route('register')
                ->withErrors(['error' => 'Une erreur est survenue lors de la création du compte.'])
                ->withInput();
        }
    }

    // ... logout() reste identique ...
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}