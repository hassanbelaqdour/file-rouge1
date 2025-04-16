<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Affichage de la liste des utilisateurs
    public function users(Request $request)
    {
        // Vérifie s’il y a un filtre "status" dans la requête (pending ou approved)
        $status = $request->query('status');

        $query = User::query();

        if ($status === 'pending') {
            $query->where('status', 'En attente');
        } elseif ($status === 'approved') {
            $query->where('status', 'Actif');
        }

        $users = $query->paginate(10); // pagination

        return view('admin.users', compact('users'));
    }

    // Formulaire de modification d’un utilisateur
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users-edit', compact('user'));
    }

    // Enregistrement des modifications
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'role' => 'required|in:user,admin',
            'status' => 'required|in:Actif,En attente',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role', 'status'));

        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Suppression d’un utilisateur
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        // Option : empêcher de supprimer son propre compte
        

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé.');
    }
}
