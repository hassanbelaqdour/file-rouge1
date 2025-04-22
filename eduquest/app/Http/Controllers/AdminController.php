<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function showUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.Users', compact('users'));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'approved';
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur approuvé.');
    }

    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'pending';
        $user->save();

        return redirect()->back()->with('success', 'Statut changé en "pending".');
    }

     public function deleteUser($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
 
         return redirect()->back()->with('success', 'Utilisateur supprimé.');
     }
     public function statistiquesAdmin()
{
    // Total des utilisateurs
    $totalUsers = \App\Models\User::count();

    // Nombre d'utilisateurs en attente
    $pendingUsers = \App\Models\User::where('account_status', 'pending')->count();

    // Nombre d'utilisateurs approuvés
    $approvedUsers = \App\Models\User::where('account_status', 'approved')->count();

    // Retourner la vue avec les statistiques
    return view('admin.StatistiqueAdmin', compact('totalUsers', 'pendingUsers', 'approvedUsers'));
}

}
