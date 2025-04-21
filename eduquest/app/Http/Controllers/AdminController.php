<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Affiche tous les utilisateurs (pending + approved)
    public function showUsers()
    {
        $pendingUsers = User::where('account_status', 'pending')->get();
        $approvedUsers = User::where('account_status', 'approved')->get();

        return view('admin.Users', compact('pendingUsers', 'approvedUsers'));
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

     // Supprimer un utilisateur
     public function deleteUser($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
 
         return redirect()->back()->with('success', 'Utilisateur supprimé.');
     }
}
