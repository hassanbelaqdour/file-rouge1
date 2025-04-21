<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Afficher les utilisateurs
    public function showPendingUsers()
    {
        $users = User::all();
        return view('admin.Users', compact('users'));
    }

    // Approuver un utilisateur
    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'approved';
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur approuvé.');
    }

    // Rejeter un utilisateur (changer en pending)
    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'pending';
        $user->save();

        return redirect()->back()->with('success', 'Statut changé en "pending".');
    }
}
