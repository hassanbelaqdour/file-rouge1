<?php

// Notez le changement de namespace ici
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Assurez-vous que cette ligne est correcte
use App\Models\Course;              // Importer le modèle Course
use Illuminate\Http\Request;        // Même si non utilisé directement ici, bonne pratique
use Illuminate\Support\Facades\Auth; // Importer Auth

class LikesController extends Controller
{
    /**
     * Ajoute ou retire un like pour un cours donné par l'utilisateur connecté.
     *
     * @param  \App\Models\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleLike(Course $course)
    {
        $user = Auth::user();

        if (!$user) {
            // Normalement géré par le middleware auth, mais sécurité supplémentaire
            return redirect()->route('login');
        }

        // Utilise la méthode toggle sur la relation BelongsToMany
        $likeExists = $user->likedCourses()->where('course_id', $course->id)->exists();

        if ($likeExists) {
            // Si le like existe, on le retire (detach)
            $user->likedCourses()->detach($course->id);
            $message = 'Cours retiré de vos favoris.';
        } else {
            // Sinon, on l'ajoute (attach)
            $user->likedCourses()->attach($course->id);
            $message = 'Cours ajouté à vos favoris !';
        }

        // Retourne à la page précédente avec un message de succès
        return back()->with('status', $message);
    }

    /**
     * Affiche la page des cours favoris de l'utilisateur connecté.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showFavorites()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Récupère les cours likés via la relation définie dans le modèle User
        // avec pagination et eager loading de la catégorie
        $likedCourses = $user->likedCourses()
                             ->with('category') // Évite les requêtes N+1
                             ->paginate(9);    // Nombre d'éléments par page

        // Passe les cours likés à la vue. La vue est toujours dans 'student.'
        return view('student.CoursesFavories', ['courses' => $likedCourses]);
    }
}