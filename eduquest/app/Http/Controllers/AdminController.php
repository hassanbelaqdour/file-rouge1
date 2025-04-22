<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function showUsers()
    {
        $pendingUsers = User::where('account_status', 'pending')->get();
        $approvedUsers = User::where('account_status', 'approved')->get();

        return view('admin.Users', compact('pendingUsers', 'approvedUsers'));
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
}
