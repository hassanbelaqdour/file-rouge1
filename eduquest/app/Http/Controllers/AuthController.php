<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route('login')
                ->withErrors(['email' => __('auth.failed')])
                ->onlyInput('email');
        }

        if ($user->account_status !== 'approved') {
            return redirect()->route('login')
                ->withErrors(['email' => 'Votre compte est en attente de validation par un administrateur.'])
                ->onlyInput('email');
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.Users'));
        } elseif ($user->role === 'teacher') {
            return redirect()->intended(route('teacher.StatistiqueTeacher'));
        } elseif ($user->role === 'student') {
            return redirect()->intended(route('MyCourses'));
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')
                ->withErrors(['email' => 'Rôle utilisateur non valide ou inconnu.'])
                ->onlyInput('email');
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
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

        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')
                ->with('status', 'Compte créé avec succès ! Veuillez attendre son approbation par un administrateur.');

        } catch (\Exception $e) {
            return redirect()->route('register')
                ->withErrors(['error' => 'Une erreur est survenue lors de la création du compte.'])
                ->withInput();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}