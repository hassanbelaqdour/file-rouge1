<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
// Ajoute Paginator si tu configures les styles dans AppServiceProvider
// use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{

    public function showUsers(Request $request)
    {
        // 1. Récupérer les valeurs des filtres depuis l'URL (?role=...&status=...)
        $selectedRole = $request->query('role');
        $selectedStatus = $request->query('status');
        $searchTerm = $request->query('search'); // Ajouter la recherche

        // 2. Commencer la requête de base
        $query = User::orderBy('created_at', 'desc');

        // Appliquer la recherche si un terme est fourni
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        // 3. Appliquer le filtre par rôle si un rôle est sélectionné
        if ($selectedRole && in_array($selectedRole, ['student', 'teacher', 'admin'])) {
            $query->where('role', $selectedRole);
        }

        // 4. Appliquer le filtre par statut si un statut est sélectionné
        // Adapte 'suspended' si ton statut est différent (ex: 'rejected', 'inactive')
        if ($selectedStatus && in_array($selectedStatus, ['pending', 'approved', 'suspended'])) {
             // Si tu utilises 'rejected' dans la DB pour suspendu:
             // if ($selectedStatus == 'suspended') { $query->where('account_status', 'rejected'); }
             // else { $query->where('account_status', $selectedStatus); }

             // Si tu as une colonne 'account_status' avec 'approved', 'pending', 'suspended'
             $query->where('account_status', $selectedStatus);
        }

        // 5. Paginer les résultats (filtrés ou non) et conserver les filtres
        $users = $query->paginate(12)->appends($request->query()); // Ex: 12 utilisateurs par page

        // 6. Passer les utilisateurs ET les filtres sélectionnés à la vue
        // Ajoute aussi 'searchTerm' si tu veux le réafficher dans le champ
        return view('admin.Users', compact('users', 'selectedRole', 'selectedStatus', /* 'searchTerm' */));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'approved';
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur approuvé.');
    }

    public function rejectUser($id) // Cette route est utilisée pour "Suspendre" et "Mettre en attente"
    {
        $user = User::findOrFail($id);
        // Peut-être que tu veux un statut 'suspended' distinct de 'pending' ?
        // Si oui, il faudrait une autre route/méthode pour suspendre vs rejeter à l'état initial.
        // Pour l'instant, on met 'pending' comme dans ton code original.
        // Si tu veux 'suspended': $user->account_status = 'suspended';
        $user->account_status = 'pending'; // Ou 'suspended' si tu as ce statut
        $user->save();
        return redirect()->back()->with('success', 'Statut utilisateur mis à jour.'); // Message plus générique
    }

    public function deleteUser($id)
    {
         $user = User::findOrFail($id);
         // Peut-être ajouter une logique de suppression soft (SoftDeletes trait) ?
         $user->delete();
         return redirect()->back()->with('success', 'Utilisateur supprimé.');
    }

    public function statistiquesAdmin()
    {
        // Statistiques Utilisateurs
        $totalUsers = User::count();
        $pendingUsers = User::where('account_status', 'pending')->count();
        $approvedUsers = User::where('account_status', 'approved')->count();
        // Optionnel: Si tu as un statut 'suspended' ou autre
        // $suspendedUsers = User::where('account_status', 'suspended')->count();

        // Statistiques Cours
        $totalCourses = Course::count();
        $acceptedCourses = Course::where('status', 'accepted')->count();
        $rejectedCourses = Course::where('status', 'rejected')->count();
        $pendingCourses = Course::where('status', 'pending')->count(); // Assure-toi que 'pending' est le bon statut

        // Passe toutes les données nécessaires à la vue
        return view('admin.StatistiqueAdmin', compact(
            'totalUsers',
            'pendingUsers',
            'approvedUsers',
            // 'suspendedUsers', // Décommente si tu l'utilises

            'totalCourses',
            'acceptedCourses',
            'rejectedCourses',
            'pendingCourses'
        ));
    }

    // **** CORRECTION ICI ****
    public function gestionCourses()
    {
        // **MODIFIÉ : Utiliser paginate() au lieu de get()**
        // Charger aussi les relations nécessaires pour la vue (teacher, category)
        $courses = Course::with(['teacher', 'category'])
                         ->orderBy('created_at', 'desc')
                         ->paginate(12); // <-- Utilise paginate()

        return view('admin.GestionCourses', compact('courses'));
    }
    // **** FIN CORRECTION ****

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
        // Décide si rejeter signifie 'rejected' ou remettre à 'pending'
        $course->status = 'rejected'; // Ou 'pending' si c'est l'action 'Mettre en attente'
        $course->save();
        return redirect()->back()->with('success', 'Statut du cours mis à jour.');
    }

}