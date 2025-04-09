<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <- Très important !
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     * Accessible uniquement aux invités grâce au middleware 'guest' dans web.php
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Assurez-vous que resources/views/auth/login.blade.php existe
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
            return redirect()->route('login') // Utiliser le nom de la route
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

            // Redirection vers la page souhaitée après connexion (ex: dashboard)
            // redirect()->intended() est utile si l'utilisateur essayait d'accéder
            // à une page protégée avant d'être redirigé vers login.
            return redirect()->intended(route('MyCourses')); // Assurez-vous d'avoir une route nommée 'dashboard'
        }

        // --- Échec de l'authentification ---
        // (Soit email/mdp incorrect, soit compte non approuvé)
        return redirect()->route('login')
            // Utiliser une clé d'erreur générique pour la sécurité.
            // Laravel a une traduction pour 'auth.failed' dans lang/en/auth.php
            ->withErrors(['email' => __('auth.failed')])
            ->onlyInput('email', 'remember'); // Renvoyer l'email et le remember, mais pas le mdp
    }

    /**
     * Affiche le formulaire d'inscription.
     * Accessible uniquement aux invités.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Assurez-vous que resources/views/auth/register.blade.php existe
    }

    /**
     * Gère l'enregistrement d'un nouvel utilisateur.
     * Accessible uniquement aux invités.
     */
    public function register(Request $request): RedirectResponse
    {
        // --- Validation ---
        // Note: Utilisation de first_name et last_name selon votre migration
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // unique:users
            'password' => ['required', 'string', Password::min(8)->letters()->numbers(), 'confirmed'], // Règles de mdp + confirmation
            // 'password_confirmation' est géré par la règle 'confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        // --- Création de l'utilisateur ---
        // 'role' et 'account_status' prendront leurs valeurs par défaut ('student', 'pending')
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Optionnel: Envoyer un email de notification à l'admin pour approbation
            // Ou un email à l'utilisateur pour confirmer la création en attente

            // --- Redirection après succès ---
            // NE PAS connecter l'utilisateur avec Auth::login($user); car il est 'pending'
            return redirect()->route('login')
                ->with('status', 'Compte créé avec succès ! Veuillez attendre son approbation par un administrateur.');

        } catch (\Exception $e) {
            // Gérer une éventuelle erreur de base de données
            // Log::error("Erreur d'enregistrement: " . $e->getMessage()); // Pensez à logger l'erreur
            return redirect()->route('register')
                ->withErrors(['error' => 'Une erreur est survenue lors de la création du compte.'])
                ->withInput();
        }
    }

    /**
     * Gère la déconnexion de l'utilisateur.
     * Accessible uniquement aux utilisateurs connectés grâce au middleware 'auth'.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); // Utilise la méthode de déconnexion de Laravel

        $request->session()->invalidate(); // Invalide la session

        $request->session()->regenerateToken(); // Régénère le token CSRF

        return redirect('/'); // Redirige vers la page d'accueil (ou 'login')
    }
}