<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to Google’s OAuth page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function callback()
    {
        try {
            // Get the user information from Google
            $user = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Google authentication error: ' . $e->getMessage());
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::updateOrCreate([
                'email' => $user->email
            ], [
                'first_name' => $user->user['given_name'] ?? null,
                'last_name' => $user->user['family_name'] ?? null,
                'name' => $user->name,
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
                'role' => 'student',
                'account_status' => 'approved'
            ]);
            Auth::login($newUser);
        }

        return redirect('/MyCourses');
    }
}
