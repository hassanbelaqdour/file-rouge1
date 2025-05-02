<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function showUsers(Request $request)
    {
        // 1. Récupérer les valeurs des filtres depuis l'URL (?role=...&status=...)
        $selectedRole = $request->query('role');
        $selectedStatus = $request->query('status');

        // 2. Commencer la requête de base
        $query = User::orderBy('created_at', 'desc');

        // 3. Appliquer le filtre par rôle si un rôle est sélectionné
        if ($selectedRole && in_array($selectedRole, ['student', 'teacher', 'admin'])) { // Vérifie si la valeur est valide
            $query->where('role', $selectedRole);
        }

        // 4. Appliquer le filtre par statut si un statut est sélectionné
        if ($selectedStatus && in_array($selectedStatus, ['pending', 'approved'])) { // Vérifie si la valeur est valide
            $query->where('account_status', $selectedStatus);
        }

        // 5. Paginer les résultats (filtrés ou non)
        //    Utiliser appends($request->query()) pour conserver TOUS les paramètres d'URL (y compris les filtres) dans les liens de pagination
        $users = $query->paginate(10)->appends($request->query()); // Garde 10 par page

        // 6. Passer les utilisateurs ET les filtres sélectionnés à la vue
        return view('admin.Users', compact('users', 'selectedRole', 'selectedStatus'));
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
        $totalUsers = \App\Models\User::count();
        $pendingUsers = \App\Models\User::where('account_status', 'pending')->count();
        $approvedUsers = \App\Models\User::where('account_status', 'approved')->count();

        return view('admin.StatistiqueAdmin', compact('totalUsers', 'pendingUsers', 'approvedUsers'));
    }

    public function gestionCourses()
{
    $courses = Course::orderBy('created_at', 'desc')->get();
    return view('admin.GestionCourses', compact('courses'));
}

public function acceptCourse($id)
{
    $course = Course::findOrFail($id);
    $course->status = 'accepted';
    $course->save();

    return redirect()->back()->with('success', 'Cours accepté.');
}

public function rejectCourse($id)
{
    $course = Course::findOrFail($id);
    $course->status = 'rejected';
    $course->save();

    return redirect()->back()->with('success', 'Cours rejeté.');
}

}
